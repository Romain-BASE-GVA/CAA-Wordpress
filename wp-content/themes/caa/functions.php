<?php

// require_once('functions/enqueue-scripts.php');
require_once('functions/init.php');
require_once('functions/custom-admin.php');
require_once('functions/menus.php');
require_once('functions/utils.php');
require_once('functions/security.php');
require_once('functions/breadcrumb.php');

// Custom Post Type
require_once('custom-post/custom-post-solution-areas.php');
require_once('custom-post/custom-post-solutions.php');
require_once('custom-post/custom-post-experts.php');
require_once('custom-post/custom-post-partners.php');
require_once('custom-post/custom-post-successful-experiences.php');
require_once('custom-post/custom-post-resources.php');
require_once('custom-post/custom-post-events.php');
require_once('custom-post/change-posts-post-type.php');

// Custom Taxonomy Domains
require_once('custom-post/custom-taxonomies.php');

// Custom Taxonomy Domains
require_once('functions/algolia.php');

?>