<?php
$view = new view;
$view->name = 'workbench_edited';
$view->description = '';
$view->tag = '';
$view->base_table = 'node_revision';
$view->api_version = '3.0-alpha1';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

/* Display: Defaults */
$handler = $view->new_display('default', 'Defaults', 'default');
$handler->display->display_options['title'] = 'Content I\'ve Edited';
$handler->display->display_options['use_more_always'] = TRUE;
$handler->display->display_options['use_more_text'] = 'view all';
$handler->display->display_options['group_by'] = TRUE;
$handler->display->display_options['access']['type'] = 'perm';
$handler->display->display_options['access']['perm'] = 'access workbench';
$handler->display->display_options['cache']['type'] = 'none';
$handler->display->display_options['query']['type'] = 'views_query';
$handler->display->display_options['exposed_form']['type'] = 'basic';
$handler->display->display_options['pager']['type'] = 'full';
$handler->display->display_options['pager']['options']['items_per_page'] = '25';
$handler->display->display_options['pager']['options']['offset'] = '0';
$handler->display->display_options['pager']['options']['id'] = '0';
$handler->display->display_options['style_plugin'] = 'table';
$handler->display->display_options['style_options']['columns'] = array(
  'title' => 'title',
  'type' => 'type',
  'status' => 'status',
  'changed' => 'changed',
  'edit_node' => 'edit_node',
);
$handler->display->display_options['style_options']['default'] = '-1';
$handler->display->display_options['style_options']['info'] = array(
  'title' => array(
    'sortable' => 0,
    'align' => '',
    'separator' => '',
  ),
  'type' => array(
    'sortable' => 0,
    'align' => '',
    'separator' => '',
  ),
  'status' => array(
    'sortable' => 0,
    'align' => '',
    'separator' => '',
  ),
  'changed' => array(
    'sortable' => 0,
    'align' => '',
    'separator' => '',
  ),
  'edit_node' => array(
    'align' => '',
    'separator' => '',
  ),
);
$handler->display->display_options['style_options']['override'] = 1;
$handler->display->display_options['style_options']['sticky'] = 0;
/* Footer: Global: Text area */
$handler->display->display_options['footer']['area']['id'] = 'area';
$handler->display->display_options['footer']['area']['table'] = 'views';
$handler->display->display_options['footer']['area']['field'] = 'area';
$handler->display->display_options['footer']['area']['empty'] = TRUE;
$handler->display->display_options['footer']['area']['content'] = 'Edited something recently and it\'s not in this list? If a content type isn\'t revisioned and you didn\'t create it, it will not show up in this list when you edit it. You can find it in the \'Content I Can Edit\' tab.';
$handler->display->display_options['footer']['area']['format'] = '1';
/* Empty text: Global: Text area */
$handler->display->display_options['empty']['area']['id'] = 'area';
$handler->display->display_options['empty']['area']['table'] = 'views';
$handler->display->display_options['empty']['area']['field'] = 'area';
$handler->display->display_options['empty']['area']['empty'] = FALSE;
$handler->display->display_options['empty']['area']['content'] = 'You haven\'t created or edited any content.';
$handler->display->display_options['empty']['area']['format'] = '1';
/* Relationship: Node revision: User */
$handler->display->display_options['relationships']['uid']['id'] = 'uid';
$handler->display->display_options['relationships']['uid']['table'] = 'node_revision';
$handler->display->display_options['relationships']['uid']['field'] = 'uid';
/* Field: Node: Nid */
$handler->display->display_options['fields']['nid']['id'] = 'nid';
$handler->display->display_options['fields']['nid']['table'] = 'node';
$handler->display->display_options['fields']['nid']['field'] = 'nid';
$handler->display->display_options['fields']['nid']['group_type'] = 'count';
$handler->display->display_options['fields']['nid']['label'] = 'GROUPING FIELD TO FORCE DISTINCT';
$handler->display->display_options['fields']['nid']['exclude'] = TRUE;
$handler->display->display_options['fields']['nid']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['nid']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['nid']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['nid']['alter']['trim'] = 0;
$handler->display->display_options['fields']['nid']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['nid']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['nid']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['nid']['alter']['html'] = 0;
$handler->display->display_options['fields']['nid']['hide_empty'] = 0;
$handler->display->display_options['fields']['nid']['empty_zero'] = 0;
/* Field: Node: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['title']['alter']['trim'] = 0;
$handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['title']['alter']['html'] = 0;
$handler->display->display_options['fields']['title']['hide_empty'] = 0;
$handler->display->display_options['fields']['title']['empty_zero'] = 0;
$handler->display->display_options['fields']['title']['link_to_node'] = 1;
/* Field: Node: Type */
$handler->display->display_options['fields']['type']['id'] = 'type';
$handler->display->display_options['fields']['type']['table'] = 'node';
$handler->display->display_options['fields']['type']['field'] = 'type';
$handler->display->display_options['fields']['type']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['type']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['type']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['type']['alter']['trim'] = 0;
$handler->display->display_options['fields']['type']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['type']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['type']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['type']['alter']['html'] = 0;
$handler->display->display_options['fields']['type']['hide_empty'] = 0;
$handler->display->display_options['fields']['type']['empty_zero'] = 0;
$handler->display->display_options['fields']['type']['link_to_node'] = 0;
$handler->display->display_options['fields']['type']['machine_name'] = 0;
/* Field: Node: Published */
$handler->display->display_options['fields']['status']['id'] = 'status';
$handler->display->display_options['fields']['status']['table'] = 'node';
$handler->display->display_options['fields']['status']['field'] = 'status';
$handler->display->display_options['fields']['status']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['status']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['status']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['status']['alter']['trim'] = 0;
$handler->display->display_options['fields']['status']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['status']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['status']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['status']['alter']['html'] = 0;
$handler->display->display_options['fields']['status']['hide_empty'] = 0;
$handler->display->display_options['fields']['status']['empty_zero'] = 0;
$handler->display->display_options['fields']['status']['not'] = 0;
/* Field: Node: Updated date */
$handler->display->display_options['fields']['changed']['id'] = 'changed';
$handler->display->display_options['fields']['changed']['table'] = 'node';
$handler->display->display_options['fields']['changed']['field'] = 'changed';
$handler->display->display_options['fields']['changed']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['changed']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['changed']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['changed']['alter']['trim'] = 0;
$handler->display->display_options['fields']['changed']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['changed']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['changed']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['changed']['alter']['html'] = 0;
$handler->display->display_options['fields']['changed']['hide_empty'] = 0;
$handler->display->display_options['fields']['changed']['empty_zero'] = 0;
/* Field: Node: Edit link */
$handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
$handler->display->display_options['fields']['edit_node']['table'] = 'node';
$handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
$handler->display->display_options['fields']['edit_node']['label'] = '';
$handler->display->display_options['fields']['edit_node']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['trim'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['edit_node']['alter']['html'] = 0;
$handler->display->display_options['fields']['edit_node']['hide_empty'] = 0;
$handler->display->display_options['fields']['edit_node']['empty_zero'] = 0;
$handler->display->display_options['fields']['edit_node']['text'] = 'edit';
/* Sort criterion: Node: Updated date */
$handler->display->display_options['sorts']['changed']['id'] = 'changed';
$handler->display->display_options['sorts']['changed']['table'] = 'node';
$handler->display->display_options['sorts']['changed']['field'] = 'changed';
$handler->display->display_options['sorts']['changed']['order'] = 'DESC';
/* Filter: User: Current */
$handler->display->display_options['filters']['uid_current']['id'] = 'uid_current';
$handler->display->display_options['filters']['uid_current']['table'] = 'users';
$handler->display->display_options['filters']['uid_current']['field'] = 'uid_current';
$handler->display->display_options['filters']['uid_current']['relationship'] = 'uid';
$handler->display->display_options['filters']['uid_current']['value'] = '1';
/* Filter: Node: Title */
$handler->display->display_options['filters']['title']['id'] = 'title';
$handler->display->display_options['filters']['title']['table'] = 'node';
$handler->display->display_options['filters']['title']['field'] = 'title';
$handler->display->display_options['filters']['title']['operator'] = 'contains';
$handler->display->display_options['filters']['title']['exposed'] = TRUE;
$handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
$handler->display->display_options['filters']['title']['expose']['label'] = 'Title';
$handler->display->display_options['filters']['title']['expose']['use_operator'] = 0;
$handler->display->display_options['filters']['title']['expose']['identifier'] = 'title';
$handler->display->display_options['filters']['title']['case'] = 0;
/* Filter: Node: Type */
$handler->display->display_options['filters']['type']['id'] = 'type';
$handler->display->display_options['filters']['type']['table'] = 'node';
$handler->display->display_options['filters']['type']['field'] = 'type';
$handler->display->display_options['filters']['type']['exposed'] = TRUE;
$handler->display->display_options['filters']['type']['expose']['operator'] = 'type_op';
$handler->display->display_options['filters']['type']['expose']['label'] = 'Type';
$handler->display->display_options['filters']['type']['expose']['use_operator'] = 0;
$handler->display->display_options['filters']['type']['expose']['identifier'] = 'type';
$handler->display->display_options['filters']['type']['expose']['reduce'] = 0;
/* Filter: Node: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 'All';
$handler->display->display_options['filters']['status']['exposed'] = TRUE;
$handler->display->display_options['filters']['status']['expose']['label'] = 'Published';
$handler->display->display_options['filters']['status']['expose']['identifier'] = 'published';

/* Display: Page */
$handler = $view->new_display('page', 'Page', 'page_1');
$handler->display->display_options['path'] = 'admin/config/workbench/page/content/edited';
$handler->display->display_options['menu']['type'] = 'tab';
$handler->display->display_options['menu']['title'] = 'Content I\'ve Edited';
$handler->display->display_options['menu']['weight'] = '1';

/* Display: Block */
$handler = $view->new_display('block', 'Block', 'block_1');
$handler->display->display_options['defaults']['use_more'] = FALSE;
$handler->display->display_options['use_more'] = TRUE;
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'some';
$handler->display->display_options['pager']['options']['items_per_page'] = '5';
$handler->display->display_options['pager']['options']['offset'] = '0';
$handler->display->display_options['defaults']['header'] = FALSE;
/* Header: Global: Text area */
$handler->display->display_options['header']['area']['id'] = 'area';
$handler->display->display_options['header']['area']['table'] = 'views';
$handler->display->display_options['header']['area']['field'] = 'area';
$handler->display->display_options['header']['area']['empty'] = FALSE;
$handler->display->display_options['header']['area']['content'] = 'Five of the most recently updated pieces of content.';
$handler->display->display_options['header']['area']['format'] = '1';
$handler->display->display_options['defaults']['footer'] = FALSE;
$handler->display->display_options['defaults']['filters'] = FALSE;
/* Filter: User: Current */
$handler->display->display_options['filters']['uid_current']['id'] = 'uid_current';
$handler->display->display_options['filters']['uid_current']['table'] = 'users';
$handler->display->display_options['filters']['uid_current']['field'] = 'uid_current';
$handler->display->display_options['filters']['uid_current']['relationship'] = 'uid';
$handler->display->display_options['filters']['uid_current']['value'] = '1';
