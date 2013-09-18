# Database
Contains general database design and standards.

## Users
The users table contains...user information. Only authentication related informaiton should be stored here:

```php
id                      //Unique user ID
email                   //Unique email
password                //Hashed password
confirmation            //Confirmation state
confirmation_date       //Time of last confirmation action

updated_at              //Timestamp of last update
created_at              //Timestamp of creation date
```

#### confirmation
      0     => not confirmed
    > 0     => # of confirmation attempts
     -1     => confirmed