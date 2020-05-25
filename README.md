Workbench
=========

A framework for simplified content management.

Introduction
----

Workbench provides a simplified user interface and an API to integrate other
Drupal modules.  Workbench on its own provides Content contributors a way to
easily access their own content.

Workbench gains more features when you install and enable these modules:

* Workbench Access - http://drupal.org/project/workbench_access
* Content Moderation - part of Drupal core

One way to think about Workbench is that it becomes the Dashboard for content
contributors.  Basically, putting all of the content needs of a user in one
place.


Use Case
----
Drupal provides a great framework for building functionality.  Workbench helps
harness content-focused features in one unified user interface.  The goal
is that a user does not need to learn Drupal in order to add content to the
site.

Users need access to their account, their content, and to add new content.
Instead of having to know how to navigate to My Account (/user/[uid]),
Add content (node/add), and Find Content (admin/content), the user goes to
My Workbench instead.

Simple changes like this help ease the learning curve for new users.

With additional Workbench modules like Workbench Access and Workbench
Moderation, Workbench becomes a full system which controls who can access
content and provide editorial workflow so that only the correct content is
published.


Permissions
----

Once a user role has access to create content, Workbench becomes
immediately useful.

Workbench Permissions

* Access My Workbench
  For any user role who may access their own workbench a.k.a My Workbench

* Administer Workbench
  For administrators to change the Views displayed in Workbench.

A typical permission setup so that a user can take advantage of Workbench
looks like so:

Node Permissions
* Article: Create new content
* Article: Edit own content
* Article: Delete own content
* Basic page: Create new content
* Basic page: Edit own content
* Basic page: Delete own content

System Permissions
* View the administration theme

Toolbar Permissions
* Use the administration toolbar

Workbench Permissions
* Access My Workbench


Using the module
----

As an Administrator or a user with Access My Workbench permissions, you will
see My Workbench in the toolbar to the right of the Home icon.

The default page is the My Content page. On the My Content tab, you can see
three areas:

* Your Profile
* Your most recent edits
* Recent content

This is your content dashboard.  As soon as you Add or edit content, it will
be displayed in the Your most recent edits block.

Notice the sub tabs:

 - Your most recent edits
 - Recent content

These go to full page lists with filters available to shorten the list of
content.  You can filter the list by:

 - Title (keywords)
 - Type (Content type)
 - Published (status of the content)
 - Items per page (defaults to 25)

Any lists of content include columns labels which can sort the current list.
Each item in the list links to the full content or you can click edit to
start editing.

Click the Create Content tab to view a list of types of content that you can
create.  Workbench shows various Node Types that you have permission to create.

Click the type of content you want to add, then follow the usual procedure for
adding content.

Workbench content
-----------------

Administrators also have access to the configuration tab and page.

By default, the module ships with 4 main pages and 3 Views. You can configure
which page elements are displayed at /admin/config/workflow/workbench.

The admin page lets you assign Views to the 5 fundamental areas of Workbench.

Those areas are as follows:

```
  Page: My Workbench
  Path:  /admin/workbench
  Region map:

  -------------------------------------------
  |   overview_left   |   overview.right    |
  -------------------------------------------
  |             overview_main               |
  -------------------------------------------

  Page: My edits
  Path:  /admin/workbench/content/edited
  Region map:

  -------------------------------------------
  |               edits_main                |
  -------------------------------------------

  Page: All recent content
  Path:  /admin/workbench/content/all
  Region map:

  -------------------------------------------
  |                all_main                 |
  -------------------------------------------

```

Note that the Create content tab is not a View and is not configurable.

If you wish to override the display in code, you may do so. See workbench.api.php
for details.

Upgrading to 8.x-1.3
------
The 8.x-1.3 release corrects an error in the way revisions were tracked. Updating the view in code is not feasible, so the easiest way to update is as follows:

* Delete the existing View "Workbench: Edits by user" (`workbench_edited`)
* Reimport the View configuration using the Configuration Import screen or by disabling and re-enabling the Workbench module.


Issues
------
Please file issues at https://drupal.org/project/workbench.

Note that issues related to other modules in the Workbench suite (including
Workbench Access, Workbench Moderation, and Workbench Files) should be filed
under their proper modules.

Credits
-------
Icons created by iconmonstr and used under license.
https://iconmonstr.com/license/

Help Pages
----------
This help text page will look better with the Markdown module installed.
https://drupal.org/project/markdown

