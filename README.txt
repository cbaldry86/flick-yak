# Flick-Yak
A site dedicated to flicks and having a yak created by:

- Craig Baldry
- 10494962

## Reference
https://www.w3schools.com/css/default.asp


## Setup Database with XAMMP 

To setup site:
1. Copy entire flick-yack folder over to the htc folder
2. Start the apache and mysql modules
3. Open admin page for mysql
4. Select import tab and under file to import, choose mds_db.sql file
5. Once file selected press go then navigate to http://localhost:2431/flick-yak/

## Login Details

Users Available:
---------------------------------
| Username  | Password | Access |
---------------------------------
| cbaldry   | 12345    | admin  |
| dbaldry   | qwert    | admin  |
| lbaldry   | asdfg    | member |
| rbaldry   | Abc123   | member |
| mbaldry   | 123ab    | member |
---------------------------------


## Manual Testing

- To clear previous session use http://localhost:2431/flick-yak/views/common/logout.php
- Once cleared try the following restricted access pages for members:
  - http://localhost:2431/flick-yak/views/member/user_profile.php?id=1
  - http://localhost:2431/flick-yak/views/member/update_member_profile.php?id=1
  - http://localhost:2431/flick-yak/views/member/update_member_profile_h.php?id=1
- Next try the following admin pages:
  - http://localhost:2431/flick-yak/views/admin/add_movie.php
  - http://localhost:2431/flick-yak/views/admin/all_users.php
  - http://localhost:2431/flick-yak/views/admin/new_movie.php
  - http://localhost:2431/flick-yak/views/admin/delete_movie.php?id=1
- Also try:
  - http://localhost:2431/flick-yak/views/forms/login_form.php
  - http://localhost:2431/flick-yak/views/common/nav.php

