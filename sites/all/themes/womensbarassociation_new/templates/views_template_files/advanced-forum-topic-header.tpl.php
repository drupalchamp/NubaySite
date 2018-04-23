<?php

/**
 * @file
 * Theme implementation: Template for forum topic header.
 *
 * - $node: Node object.
 * - $search: Search box to search this topic (Requires Node Comments)
 * - $reply_link: Text link / button to reply to topic.
 * - $total_posts_count: Number of posts in topic.
 * - $new_posts_count: Number of new posts in topic.
 * - $first_new_post_link: Link to first unread post.
 * - $last_post_link: Link to last post.
 * - $pager: Topic pager.
 */
 global $base_url;
?>

<div id="forum-topic-header" class="forum-topic-header clearfix">
	<?php if (!empty($search)): ?>
	  <?php print $search; ?>
  <?php endif; ?>

  <div class="topic-post-count">
  <?php print $total_posts_count; ?> / <?php print t('!new new', array('!new' => $new_posts_count)); ?>
  </div>

  <?php if (!empty($reply_link)): ?>
    <div class="topic-reply-link">
    <?php print $reply_link; ?>
    </div>
  <?php endif; ?>
  
   <div class="topic-reply-link">
    <div class="topic-reply-allowed">
	<a class="af-button-large" href="<?php print $base_url; ?>/forum/active">
	<span>List of Topics</span>
	</a>
	</div>
    </div>
    
    <div class="topic-reply-link">
    <div class="topic-reply-allowed">
        <?php
    	$nid=arg(1);
		$node=node_load($nid);
		?>
	    <a class="af-button-large" href="<?php print $base_url; ?>/node/add/forum/<?php print @$node->forum_tid;?>">
	    <span>Add New Topic</span>
	    </a>
	</div>
    </div>

  <?php if (!empty($first_new_post_link)): ?>
    <div class="topic-new-post-link">
    <?php print $first_new_post_link; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($last_post_link)): ?>
    <div class="last-post-link">
     <?php print $last_post_link; ?>
    </div>
  <?php endif; ?>


  <a id="forum-topic-top"></a>
</div>
