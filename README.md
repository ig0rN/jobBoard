# Job Board - Mini project

## Installation guide
    1) Clone repository
    2) Run 'composer update'
    3) Make db 'job_board'
    4) Run 'php artisan migrate:fresh --seed'
    
### Couple of useful comments
    1) On the root page, you can see every Job post that is approved
    2) If you want to add a job we can suppose that you need to make acc or some moderator or admin to make your profile
    3) When you add Job for the first time you can see in LOG file message which should go on the real email of every moderator and email that is typed in field 'email' on page for adding a new job. I set mail driver as LOG.
    4) You have 2 HR acc, 1 Moderator and 1 mine ACC for testing. Credentials are in seeder files
 
