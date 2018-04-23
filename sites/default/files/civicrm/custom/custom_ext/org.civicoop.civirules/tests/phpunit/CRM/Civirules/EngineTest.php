<?php

/**
 * @author Klaas Eikelboom (CiviCooP) <klaas.eikelboom@civicoop.org>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 *
 * @group headless
 */
class CRM_Civirules_EngineTest extends CRM_Civirules_Test_TestCase {

  /**
   *  Test if all the active triggers have a php class in the class loading path
   */
  public function testAllTriggersHaveCode() {
    $bao = new CRM_Civirules_BAO_Trigger();
    $bao->is_active = 1;
    $bao->find();
    while ($bao->fetch()) {
      $class_name = $bao->class_name;
      $name = $bao->name;
      if (isset($class_name)) {
        self::assertTrue(class_exists($class_name), "The $class_name class must exist for the active trigger with the name '$name' ");
      }
    }
  }

  /**
   * Test a trigger has a defined class
   */
  public function testAllTriggersHaveAClass() {
		// There are more triggers with empty class name. An empty class name means they will be triggered by the default post trigger.
		// So we should check for whether the class exists.
    $bao = new CRM_Civirules_BAO_Trigger();
    $bao->find();
    while ($bao->fetch()) {
    	// Try to get the class:
    	$class = CRM_Civirules_BAO_Trigger::getPostTriggerObjectByClassName($bao->class_name, false);
      $this->assertInstanceOf('CRM_Civirules_Trigger', $class, 'Could not instanciated trigger class for '.$bao->class_name);
    }
  }

  /**
   * Test if all the active conditions have a php class in the class loading path
   */
  public function testAllConditionsHaveCode() {
    $bao = new CRM_Civirules_BAO_Condition();
    $bao->is_active = 1;
    $bao->find();
    while ($bao->fetch()) {
      $class_name = $bao->class_name;
      $name = $bao->name;
      self::assertTrue(class_exists($class_name), "The $class_name class must exist for the active condition with the name '$name' ");
    }
  }

  /**
   * Test if all the active actions have a php class in the class loading path
   */
  public function testAllActionHaveCode() {
    $bao = new CRM_Civirules_BAO_Action();
    $bao->is_active = 1;
    $bao->find();
    while ($bao->fetch()) {
      $class_name = $bao->class_name;
      $name = $bao->name;
      self::assertTrue(class_exists($class_name), "The $class_name class must exist for the active action  with the name '$name' ");
    }
  }

  /**
   * Test the executing of the trigger for a creating a new contact (and ignoring an
   * update and a delete
   */
  public function testNewContact() {
    $this->setUpContactRule('new_contact');
    $this->assertRuleNotFired('new contact rule just set up, shoudl not be fired');

    $result = civicrm_api3("Contact", "create", array(
      'contact_type' => 'Individual',
      'first_name' => 'Adele',
      'last_name' => 'Jensen',
    ));

    $contactId = $result['id'];

    $this->assertRuleFired("After an insert the rule should fire");

    $result = civicrm_api3("Contact", "create", array(
      'id' => $contactId,
      'nick_name' => 'A.',
    ));

    $this->assertRuleNotFired("The rule must be not fired after an update");

    civicrm_api3("Contact", "delete", array(
      'id' => $contactId,
    ));
    $this->assertRuleNotFired("The rule must be not fired after an delete");
  }

  /**
   * Test the firing of the trigger for a changed contact (and ignore the create and the delete
   */
  public function testChangedContact() {
    $this->setUpContactRule('changed_contact');
    $this->assertRuleNotFired('changed contact rule just set up, should not be fired');

    $result = civicrm_api3("Contact", "create", array(
      'contact_type' => 'Individual',
      'first_name' => 'Adele',
      'last_name' => 'Jensen',
    ));

    $contactId = $result['id'];

    $this->assertRuleNotFired("The change rule must not fire after an insert");
    $result = civicrm_api3("Contact", "create", array(
      'id' => $contactId,
      'nick_name' => 'A.',
    ));
    $this->assertRuleFired("The rule must be fired after an update");
    civicrm_api3("Contact", "delete", array(
      'id' => $contactId,
    ));
    $this->assertRuleNotFired("The rule must be not fired after a delete");
  }

  /**
   * Test the firing of the trigger for a changed contact (and ignore the create and the delete
   */
  public function testDeletedContact() {
    $this->setUpContactRule('restored_contact');
    $this->assertRuleNotFired('changed contact rule just set up, should not be fired');

    $result = civicrm_api3("Contact", "create", array(
      'contact_type' => 'Individual',
      'first_name' => 'Adele',
      'last_name' => 'Jensen',
    ));

    $contactId = $result['id'];

    $this->assertRuleNotFired("The delete rule must not fire after an insert");

    $result = civicrm_api3("Contact", "create", array(
      'id' => $contactId,
      'nick_name' => 'A.',
    ));

    $this->assertRuleNotFired("The delete rule must not be fired after an update");

    $result = civicrm_api3("Contact", "delete", array(
      'id' => $contactId,
      'skip_undelete' => TRUE,
      // trigger fires alone for a real delete (trash does not count)
    ));

    $this->assertRuleFired("The delete rule must be fired after a delete");

  }
	
	/**
	 * Test processing of dealyed actions.
	 */
	public function testExecuteDelayedAction() {
		// Fake the execution of an action AddContactToGroup
		$action_id = CRM_Core_DAO::singleValueQuery("SELECT id FROM civirule_action WHERE name = 'GroupContactAdd'");
		$ruleAction = array(
			'id' => microtime(), // use time as a unique identifier
			'action_id' => $action_id,
			'action_params' => serialize(array('group_id' => $this->groupId)),
			'delay' => null,
			'ignore_condition_with_delay' => 1,
			'is_active' => 1,
		);
		
		$contact = civicrm_api3('Contact', 'getsingle', array('id' => $this->contactId));
		$triggerData = new CRM_Civirules_TriggerData_Post('Individual', $contact['id'], $contact);
		
		$actionEngine = CRM_Civirules_ActionEngine_Factory::getEngine($ruleAction, $triggerData);
		$this->assertInstanceOf('CRM_Civirules_ActionEngine_RuleActionEngine', $actionEngine, 'Could not find valud engine for rule_action');
		
		$ctx = new CRM_Queue_TaskContext();
		CRM_Civirules_Engine::executeDelayedAction($ctx, $actionEngine);
		
		// Now test whether the contact is added to the group
		$groupContactParams = array(
      'contact_id' => $this->contactId,
      'group_id' => $this->groupId,
      'version' => 3,
    );
    $groupContact = civicrm_api('group_contact', 'getsingle', $groupContactParams);
		$this->assertArrayHasKey('group_id', $groupContact, 'There was an error getting the group. Possibly the engine failed and the contact was not added to the group');
		$this->assertEquals($this->groupId, $groupContact['group_id'], 'There was an error getting the group. Possibly the engine failed and the contact was not added to the group');
	}
	
	/**
	 * Test processing of dealyed actions with the old parameter style, $ruleAction, $triggerData
	 * This test exists because in a real installation which has been upgraded the delayed action queue
	 * might still consists of actions deffined the old way. We do want those to be executed as they always did. 
	 */
	public function testExecuteDelayedActionOldStyle() {
		// Fake the execution of an action AddContactToGroup
		$action_id = CRM_Core_DAO::singleValueQuery("SELECT id FROM civirule_action WHERE name = 'GroupContactAdd'");
		$ruleAction = array(
			'id' => microtime(), // use time as a unique identifier
			'action_id' => $action_id,
			'action_params' => serialize(array('group_id' => $this->groupId)),
			'delay' => null,
			'ignore_condition_with_delay' => 1,
			'is_active' => 1,
		);
		
		$action = CRM_Civirules_BAO_Action::getActionObjectById($ruleAction['action_id']);
		$action->setRuleActionData($ruleAction);
		$contact = civicrm_api3('Contact', 'getsingle', array('id' => $this->contactId));
		$triggerData = new CRM_Civirules_TriggerData_Post('Individual', $contact['id'], $contact);
		
		$ctx = new CRM_Queue_TaskContext();
		CRM_Civirules_Engine::executeDelayedAction($ctx, $action, $triggerData);
		
		// Now test whether the contact is added to the group
		$groupContactParams = array(
      'contact_id' => $this->contactId,
      'group_id' => $this->groupId,
      'version' => 3,
    );
    $groupContact = civicrm_api('group_contact', 'getsingle', $groupContactParams);
		$this->assertArrayHasKey('group_id', $groupContact, 'There was an error getting the group. Possibly the engine failed and the contact was not added to the group');
		$this->assertEquals($this->groupId, $groupContact['group_id'], 'There was an error getting the group. Possibly the engine failed and the contact was not added to the group');
	}

}
