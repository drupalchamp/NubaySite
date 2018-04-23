<?php

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.4                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2013                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 * $Id$
 *
 */
class org_nubay_contributionsovercertaintotalamount extends CRM_Report_Form {

  protected $_summary = NULL;

  public $_drilldownReport = array('contribute/detail' => 'Link to Detail Report');

  protected $_charts = array(
    '' => 'Tabular',
    'barChart' => 'Bar Chart',
    'pieChart' => 'Pie Chart',
  );

  protected $_customGroupExtends = array('Contribution');
  protected $_customGroupGroupBy = FALSE;
  
  function __construct() {
    $this->_columns = array(
      'civicrm_contact' =>
      array(
        'dao' => 'CRM_Contact_DAO_Contact',
        'fields' =>
        array(
          'id' =>
          array(
            'no_display' => TRUE,
            'required' => TRUE,
          ),
          'display_name' =>
          array('title' => ts('Contact Name'),
            'required' => TRUE,
						'default' => TRUE,	
            'no_repeat' => TRUE,
          ),
          'contact_type' =>
          array(
            'title' => ts('Contact Type'),
          ),
          'contact_sub_type' =>
          array(
            'title' => ts('Contact SubType'),
          ),
        ),
      ),
	  'civicrm_email' =>
      array(
        'dao' => 'CRM_Core_DAO_Email',
        'fields' =>
        array(
          'email' =>
          array('title' => ts('E-mail'),
            'default' => TRUE,
			'required' => TRUE,
            'no_repeat' => TRUE,
          ),
        ),
        'grouping' => 'email-fields',
      ),
    )
	+ array(
      'civicrm_address' =>
      array(
        'dao' => 'CRM_Core_DAO_Address',
        'fields' =>
        array(
          'name' =>
          array('title' => ts('Address Name'),
            'default' => FALSE,
          ),
          'street_address' =>
          array('title' => ts('Street Address'),
            'default' => TRUE,
						'required' => FALSE,
          ),
          'supplemental_address_1' =>
          array('title' => ts('Supplementary Address Field 1'),
            'default' => TRUE,
						'required' => FALSE,
          ),
          'supplemental_address_2' =>
          array('title' => ts('Supplementary Address Field 2'),
            'default' => TRUE,
						'required' => FALSE,
          ),
          'street_number' =>
          array(
            'name' => 'street_number',
            'title' => ts('Street Number'),
            'type' => 1,
            'default' => FALSE,
          ),
          'street_name' =>
          array(
            'name' => 'street_name',
            'title' => ts('Street Name'),
            'type' => 1,
            'default' => FALSE,
          ),
          'street_unit' =>
          array(
            'name' => 'street_unit',
            'title' => ts('Street Unit'),
            'type' => 1,
            'default' => FALSE,
          ),
          'city' =>
          array('title' => ts('City'),
            'default' => TRUE,
						'required' => FALSE,
          ),
          'postal_code' =>
          array('title' => ts('ZIP/Postal Code'),
            'default' => TRUE,
						'required' => FALSE,
          ),
          'postal_code_suffix' =>
          array('title' => ts('Postal Code Suffix'),
            'default' => FALSE,
          ),
          'county_id' =>
          array('title' => ts('County'),
            'default' => FALSE,
          ),
          'state_province_id' =>
          array('title' => ts('State/Province'),
            'default' => TRUE,
						'required' => FALSE,
          ),
          'country_id' =>
          array('title' => ts('Country'),
            'default' => FALSE,
          ),
        ),
		/*'filters' => array(
			'street_number' => array('title' => ts('Street Number'),
							 'type' => 1,
							 'name' => 'street_number',
			),
			'street_name' => array('title' => ts('Street Name'),
							 'name' => 'street_name',
							 'operator' => 'like',
			),
			'postal_code' => array('title' => ts('Postal Code'),
							 'type' => 1,
							 'name' => 'postal_code',
			),
			'city' => array('title' => ts('City'),
					'operator' => 'like',
					'name' => 'city',
			),
			'county_id' => array(
				'name' => 'county_id',
				'title' => ts('County'),
				'type' => CRM_Utils_Type::T_INT,
				'operatorType' =>
				CRM_Report_Form::OP_MULTISELECT,
				'options' =>
				CRM_Core_PseudoConstant::county(),
			),
			'state_province_id' => array(
				'name' => 'state_province_id',
				'title' => ts('State/Province'),
				'type' => CRM_Utils_Type::T_INT,
				'operatorType' =>
				CRM_Report_Form::OP_MULTISELECT,
				'options' =>
				CRM_Core_PseudoConstant::stateProvince(),
			),
			'country_id' => array(
				'name' => 'country_id',
				'title' => ts('Country'),
				'type' => CRM_Utils_Type::T_INT,
				'operatorType' =>
				CRM_Report_Form::OP_MULTISELECT,
				'options' =>
				CRM_Core_PseudoConstant::country(),
			),
		),*/
        'grouping' => 'location-fields',
      ),
    )
    + array(
      'civicrm_contribution' =>
      array(
        'dao' => 'CRM_Contribute_DAO_Contribution',
        'fields' =>
        array(
		  'total_amount' =>
          array('title' => ts('Total Giving'),
            'required' => TRUE,
            'statistics' =>
            array('sum' => ts('Total Giving'),
              //'count' => ts('Donations'),
              //'avg' => ts('Average'),
			  //'last_donation_amount' => ts('Last Donation Amount'),
            ),
          ),
		  'net_amount' =>
          array('title' => ts('Last Donation Amount'),
            'required' => TRUE,
			'default' => TRUE,
          ),
		  'receive_date' =>
          array(
            'required' => TRUE,
            'statistics' =>
            array(
			  'first_donation_date' => ts('First Donation Date'),
 			  'last_donation_date' => ts('Last Donation Date'),
            ),
          ),
		  'currency' =>
          array('required' => TRUE,
             'no_display' => TRUE,
          ),
        ),
        'filters' =>
        array(
          'receive_date' =>
          array(
            //'default' => 0,
            'operatorType' => CRM_Report_Form::OP_DATE,
          ),
		  'total_range' =>
          array('title' => ts('Total Giving'),
            'type' => CRM_Utils_Type::T_INT,
            'default_op' => 'gte',
          ),
          'currency' =>
          array('title' => 'Currency',
            'operatorType' => CRM_Report_Form::OP_MULTISELECT,
            'options' => CRM_Core_OptionGroup::values('currencies_enabled'),
            'default' => NULL,
            'type' => CRM_Utils_Type::T_STRING,
            ),
          'financial_type_id' =>
          array('name' => 'financial_type_id',
            'title' => ts('Financial Type'),
            'operatorType' => CRM_Report_Form::OP_MULTISELECT,
            'options' => CRM_Contribute_PseudoConstant::financialType() ,
          ),
          'contribution_status_id' =>
          array('title' => ts('Donation Status'),
            'operatorType' => CRM_Report_Form::OP_MULTISELECT,
            'options' => CRM_Contribute_PseudoConstant::contributionStatus(),
            'default' => array(1),
          ),
        ),
      ),
	  'civicrm_phone' =>
      array(
        'dao' => 'CRM_Core_DAO_Phone',
        'fields' =>
        array(
          'phone' =>
          array('title' => ts('Phone'),
            'default' => FALSE,
            'no_repeat' => TRUE,
          ),
        ),
        'grouping' => 'phone-fields',
      ),
      /*'civicrm_group' =>
      array(
        'dao' => 'CRM_Contact_DAO_GroupContact',
        'alias' => 'cgroup',
        'filters' =>
        array(
          'gid' =>
          array(
            'name' => 'group_id',
            'title' => ts('Group'),
            'operatorType' => CRM_Report_Form::OP_MULTISELECT,
            'group' => TRUE,
            'options' => CRM_Core_PseudoConstant::group(),
          ),
        ),
      ),*/
    );

    //$this->_tagFilter = TRUE;
    $this->_currencyColumn = 'civicrm_contribution_currency';
    parent::__construct();
  }

  function preProcess() {
    parent::preProcess();
  }

  function select() {
    $select = array();
    $this->_columnHeaders = array();
    
    foreach ($this->_columns as $tableName => $table) {
      if (array_key_exists('fields', $table)) {
        foreach ($table['fields'] as $fieldName => $field) {
          if (CRM_Utils_Array::value('required', $field) ||
            CRM_Utils_Array::value($fieldName, $this->_params['fields'])
          ) {
            // only include statistics columns if set
            if (CRM_Utils_Array::value('statistics', $field)) {
              foreach ($field['statistics'] as $stat => $label) {
                switch (strtolower($stat)) {
                  case 'sum':
                    $select[] = "SUM({$field['dbAlias']}) as {$tableName}_{$fieldName}_{$stat}";
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['title'] = $label;
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['type'] = $field['type'];
                    $this->_statFields[] = "{$tableName}_{$fieldName}_{$stat}";
                    break;

                  case 'count':
                    $select[] = "COUNT({$field['dbAlias']}) as {$tableName}_{$fieldName}_{$stat}";
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['title'] = $label;
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['type'] = CRM_Utils_Type::T_INT;
                    $this->_statFields[] = "{$tableName}_{$fieldName}_{$stat}";
                    break;

                  case 'avg':
                    $select[] = "ROUND(AVG({$field['dbAlias']}),2) as {$tableName}_{$fieldName}_{$stat}";
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['type'] = $field['type'];
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['title'] = $label;
                    $this->_statFields[] = "{$tableName}_{$fieldName}_{$stat}";
                    break;
					
				  case 'first_donation_date':
                    $select[] = "MIN({$field['dbAlias']}) as {$tableName}_{$fieldName}_{$stat}";
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['type'] = $field['type'];
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['title'] = $label;
                    $this->_statFields[] = "{$tableName}_{$fieldName}_{$stat}";
                    break;
					
				  case 'last_donation_date':
                    $select[] = "MAX({$field['dbAlias']}) as {$tableName}_{$fieldName}_{$stat}";
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['type'] = $field['type'];
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['title'] = $label;
                    $this->_statFields[] = "{$tableName}_{$fieldName}_{$stat}";
                    break;
					
				  /*case 'last_donation_amount':
                    $select[] = "MAX({$this->_aliases['civicrm_contribution']}.receive_date) as {$tableName}_{$fieldName}_{$stat} , {$this->_aliases['civicrm_contribution']}.id as last_donation_id";
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['type'] = $field['type'];
                    $this->_columnHeaders["{$tableName}_{$fieldName}_{$stat}"]['title'] = $label;
                    $this->_statFields[] = "{$tableName}_{$fieldName}_{$stat}";
                    break;*/
                }
              }
            }
            else {
              $select[] = "{$field['dbAlias']} as {$tableName}_{$fieldName}";
              // $field['type'] is not always set. Use string type as default if not set.
              $this->_columnHeaders["{$tableName}_{$fieldName}"]['type'] = isset($field['type']) ? $field['type'] : 2;
              $this->_columnHeaders["{$tableName}_{$fieldName}"]['title'] = $field['title'];
            }
          }
        }
      }
    }
    
	$this->_select = " SELECT * FROM ( SELECT " . implode(', ', $select) . " ";
  }

  static function formRule($fields, $files, $self) {
    $errors = array();

    return $errors;
  }

  function from() {
	$this->_from = "
        FROM civicrm_contact {$this->_aliases['civicrm_contact']} {$this->_aclFrom}
	       	 INNER JOIN civicrm_contribution {$this->_aliases['civicrm_contribution']}
		             ON {$this->_aliases['civicrm_contact']}.id = {$this->_aliases['civicrm_contribution']}.contact_id AND {$this->_aliases['civicrm_contribution']}.is_test = 0
             LEFT  JOIN civicrm_email  {$this->_aliases['civicrm_email']}
                         ON {$this->_aliases['civicrm_contact']}.id = {$this->_aliases['civicrm_email']}.contact_id
                         AND {$this->_aliases['civicrm_email']}.is_primary = 1
             LEFT  JOIN civicrm_phone  {$this->_aliases['civicrm_phone']}
                         ON {$this->_aliases['civicrm_contact']}.id = {$this->_aliases['civicrm_phone']}.contact_id AND
                            {$this->_aliases['civicrm_phone']}.is_primary = 1
	";
    $this->addAddressFromClause();
  }

  function where() {
    $clauses = array();
    $this->_tempClause = $this->_outerCluase = '';
    foreach ($this->_columns as $tableName => $table) {
      if (array_key_exists('filters', $table)) {
        foreach ($table['filters'] as $fieldName => $field) {
          $clause = NULL;
          if (CRM_Utils_Array::value('type', $field) & CRM_Utils_Type::T_DATE) {
            $relative = CRM_Utils_Array::value("{$fieldName}_relative", $this->_params);
            $from     = CRM_Utils_Array::value("{$fieldName}_from", $this->_params);
            $to       = CRM_Utils_Array::value("{$fieldName}_to", $this->_params);

            if ($relative || $from || $to) {
              $clause = $this->dateClause($field['name'], $relative, $from, $to, $field['type']);
            }
          }
          else {
			//if ($fieldName != 'total_amount') {
				$op = CRM_Utils_Array::value("{$fieldName}_op", $this->_params);
				if ($op) {
				  $clause = $this->whereClause($field,
					$op,
					CRM_Utils_Array::value("{$fieldName}_value", $this->_params),
					CRM_Utils_Array::value("{$fieldName}_min", $this->_params),
					CRM_Utils_Array::value("{$fieldName}_max", $this->_params)
				  );
				}
			//}
          }

          if (!empty($clause)) {
			if ($fieldName == 'total_range') {
				$op = CRM_Utils_Array::value("{$fieldName}_op", $this->_params);
				$clause = $this->whereClause($field,
					$op,
					CRM_Utils_Array::value("{$fieldName}_value", $this->_params),
					CRM_Utils_Array::value("{$fieldName}_min", $this->_params),
					CRM_Utils_Array::value("{$fieldName}_max", $this->_params)
				);
				$clause = str_replace('contribution_civireport.total_range' , 'civicrm_contribution_total_amount_sum' , $clause);
				$value = CRM_Utils_Array::value("total_range_value", $this->_params);
				$this->_outerCluase = " WHERE {$clause} ";
			}
			else {
				$clauses[] = $clause;
			}	
          }
        }
      }
    }
    if (empty($clauses)) {
      $this->_where = "WHERE ( 1 ) ";
    }
    else {
      $this->_where = "WHERE " . implode(' AND ', $clauses);
    }
	
	//$this->_where = " AND civicrm_contribution_second.receive_date "
	
    if ($this->_aclWhere) {
      $this->_where .= " AND {$this->_aclWhere} ";
    }
  }

  function groupBy() {
    $this->_groupBy = "GROUP BY {$this->_aliases['civicrm_contact']}.id, {$this->_aliases['civicrm_contribution']}.currency";
  }

  function postProcess() {

    $this->beginPostProcess();

    // get the acl clauses built before we assemble the query
    $this->buildACLClause($this->_aliases['civicrm_contact']);

    $this->select();

    $this->from();

    $this->where();

    $this->groupBy();

    $this->limit();

    //set the variable value rank, rows = 0
    //$setVariable = " SET @rows:=0, @rank=0 ";
    //CRM_Core_DAO::singleValueQuery($setVariable);

    $sql = " {$this->_select} {$this->_from}  {$this->_where} {$this->_groupBy}
                     ORDER BY civicrm_contribution_total_amount_sum DESC
                 ) as abc {$this->_outerCluase} $this->_limit
               ";
	
    $dao = CRM_Core_DAO::executeQuery($sql);

    while ($dao->fetch()) {
      $row = array();
      foreach ($this->_columnHeaders as $key => $value) {
        if (property_exists($dao, $key)) {
          $row[$key] = $dao->$key;
        }
      }
      $rows[] = $row;
    }
	
    $this->formatDisplay($rows);

    $this->doTemplateAssignment($rows);

    $this->endPostProcess($rows);
  }

  function add2group($groupID) {
    if (is_numeric($groupID)) {

      $sql = "
{$this->_select} {$this->_from}  {$this->_where} {$this->_groupBy}
ORDER BY civicrm_contribution_total_amount_sum DESC
) as abc {$this->_outerCluase}";
      $dao = CRM_Core_DAO::executeQuery($sql);

      $contact_ids = array();
      // Add resulting contacts to group
      while ($dao->fetch()) {
        $contact_ids[$dao->civicrm_contact_id] = $dao->civicrm_contact_id;
      }

      CRM_Contact_BAO_GroupContact::addContactsToGroup($contact_ids, $groupID);
      CRM_Core_Session::setStatus(ts("Listed contact(s) have been added to the selected group."), ts('Contacts Added'), 'success');
    }
  }

  function limit($rowCount = CRM_Report_Form::ROW_COUNT_LIMIT) {
    // lets do the pager if in html mode
    $this->_limit = NULL;
    if ($this->_outputMode == 'html' || $this->_outputMode == 'group') {
      //replace only first occurence of SELECT
      $this->_select = preg_replace('/SELECT/', 'SELECT SQL_CALC_FOUND_ROWS ', $this->_select, 1);
      $pageId = CRM_Utils_Request::retrieve('crmPID', 'Integer', CRM_Core_DAO::$_nullObject);

      if (!$pageId && !empty($_POST) && isset($_POST['crmPID_B'])) {
        if (!isset($_POST['PagerBottomButton'])) {
          unset($_POST['crmPID_B']);
        }
        else {
          $pageId = max((int)@$_POST['crmPID_B'], 1);
        }
      }

      $pageId = $pageId ? $pageId : 1;
      $this->set(CRM_Utils_Pager::PAGE_ID, $pageId);
      $offset = ($pageId - 1) * $rowCount;

      $offset = CRM_Utils_Type::escape($offset, 'Int');
      $rowCount = CRM_Utils_Type::escape($rowCount, 'Int');

      $this->_limit = " LIMIT $offset, " . $rowCount;
    }
  }

  function alterDisplay(&$rows) {
    // custom code to alter rows

    $entryFound = FALSE;
    $rank = 1;
	
	// Get the where clauses to get the last donation amount, as we need to run another SQL to get the latest donation amount from 'civicrm_contribution' table for the contact
	foreach ($this->_columns as $tableName => $table) {
      if (array_key_exists('filters', $table) AND $tableName == 'civicrm_contribution') {
        foreach ($table['filters'] as $fieldName => $field) {
		  $clause = NULL;
          if (CRM_Utils_Array::value('type', $field) & CRM_Utils_Type::T_DATE) {
            $relative = CRM_Utils_Array::value("{$fieldName}_relative", $this->_params);
            $from     = CRM_Utils_Array::value("{$fieldName}_from", $this->_params);
            $to       = CRM_Utils_Array::value("{$fieldName}_to", $this->_params);

            if ($relative || $from || $to) {
              $clause = $this->dateClause($field['name'], $relative, $from, $to, $field['type']);
            }
          }
          else {
			$op = CRM_Utils_Array::value("{$fieldName}_op", $this->_params);
			if ($op) {
			  $clause = $this->whereClause($field,
				$op,
				CRM_Utils_Array::value("{$fieldName}_value", $this->_params),
				CRM_Utils_Array::value("{$fieldName}_min", $this->_params),
				CRM_Utils_Array::value("{$fieldName}_max", $this->_params)
			  );
			}
          }

		  if ($fieldName != 'total_range' AND !empty($clause))  {
			$clause = str_replace('contribution_civireport' , 'civicrm_contribution' , $clause);
			$clauses[] = $clause;
		  }
        }
      }
    }
	
	if (empty($clauses)) {
      $additional_where_clause = "WHERE ( 1 ) ";
    }
    else {
	  // Remove any empty OR NULL values from the clauses array, as this may result in SQL error 
	  array_filter($clauses , 'strlen');
	  $additional_where_clause = "WHERE " . implode(' AND ', $clauses);
    }
	
	if (!empty($rows)) {
      foreach ($rows as $rowNum => $row) {

        $rows[$rowNum]['civicrm_donor_rank'] = $rank++;
        // convert display name to links
        if (array_key_exists('civicrm_contact_display_name', $row) &&
          array_key_exists('civicrm_contact_id', $row) &&
            CRM_Utils_Array::value('civicrm_contribution_currency', $row)
        ) {
          $url = CRM_Report_Utils_Report::getNextUrl('contribute/detail',
            'reset=1&force=1&id_op=eq&id_value=' . $row['civicrm_contact_id'] . "&currency_value=" . $row['civicrm_contribution_currency'],
            $this->_absoluteUrl, $this->_id, $this->_drilldownReport
          );
          $rows[$rowNum]['civicrm_contact_display_name_link'] = $url;
          $entryFound = TRUE;
        }
		
		if (array_key_exists('civicrm_contribution_total_amount_last_donation_amount', $row)) {
		  if ($value = $row['civicrm_contribution_total_amount_last_donation_amount']) {	
			$contribution_params = array('version' => 3, 'id' => $value);
			$contribution_details = civicrm_api('Contribution' , 'get' , $contribution_params);
			$rows[$rowNum]['civicrm_contribution_total_amount_last_donation_amount'] = $contribution_details['values'][$value]['total_amount'];
			$entryFound = TRUE;
		  }
        }
		
		// Get the last donation amount for the contact from the contribution table
		if (array_key_exists('civicrm_contact_id', $row)) {
		  if ($value = $row['civicrm_contact_id']) {	
			$last_donation_amount = '';
			$additional_sql = "SELECT total_amount FROM civicrm_contribution $additional_where_clause AND civicrm_contribution.contact_id = $value ORDER BY receive_date DESC";
			$additional_dao = CRM_Core_DAO::executeQuery($additional_sql);
			if($additional_dao->fetch()) {
				$last_donation_amount = $additional_dao->total_amount;
			}
			$rows[$rowNum]['civicrm_contribution_net_amount'] = $last_donation_amount;
			$entryFound = TRUE;
		  }
        }
		
        $entryFound = $this->alterDisplayAddressFields($row, $rows, $rowNum, 'contribute/detail', 'List all contribution(s)') ? TRUE : $entryFound;

        // skip looking further in rows, if first row itself doesn't
        // have the column we need
        if (!$entryFound) {
          break;
        }
      }
    }
  }
}


