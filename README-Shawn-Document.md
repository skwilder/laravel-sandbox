
# Process One - Creation of User

After the database was configured I added a new user using the new route and just running this code.  I didn't actually create it through the database
```php
$user = new \App\Models\User();
$user->name = 'John Doe';
$user->email = 'john.doe@acme.com';
$user->password = 'password';
$user->save();
```

# Process Two - Validation of ID Paramater

I came across documentation around the UserProfileRequest that extends FormRequest as a way of doing validation from the request itself.  I think this is cleaner method as if we need the validation in another action, we can just use that class. 

# Process Three - Finding the User

Simply just using the find method on the existing User class

# Process Four - Validation

The detecting of a non user was easy and I added a simple reponse()->json() with a 404

# Process Four - Response and User Handling

Then added the layer of UserReponse class that transforms a user model to the reponse given to the user.  This layer is important as it removes the password and allows a method to beform other such business logic.  

After that I create the Response classes which are used to create success and not found response to the users in a standard way, this will ensure if we need to change an 'not found message' error code we change it one spot.

# Process Five - Added tests

I have added the UserProfileTest to the test suite using php artisan to create the stubs and to test out the validation of my endpoint

# Process Five - Profile URL

I create a new migration with the new field using the `php artisan make:test` command.  This new file is `2023_12_01_151337_add_profile_picture_to_users_table`.

# Process Six - MacOS Instructions update in readme.md

I have made modifications to the readme for the setup and the issues I have encountered during my setup on MacOS.  I am going to commit those seperate from my work so you can include them in future if you need to.