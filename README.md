

Products


1. Models:

* Category

- The model has only the property “ name ” for identification
the category of the different products. The relationship with the products is one-to-many because
Many products can have the same category, but one product can
belongs to only one category.


* Product

- There is a many-to-one relationship with the Category model , for the reason mentioned above.
Its relation to the User model is also many to one because User can have more than 1 product created by it, but a product can only have one creator. The model has
and an array of the name properties , productCategory, description, image, price , which can be mass - assigned , that is, given values all at once using create / update methods in a single call.


* User

- One-to-many relationship with Product . Property: id , name , email , emai _ verified _ at , password , role , remember _ token , created _ at , updated _ at , as only the name, email, password and role are mass - assignable , and the role can be set either directly from the database or from another admin, as the role is either user or admin . Built - in are used auth + bootstrap auth . Also added isAdmin function checking if the user is an admin at a later stage.


2. Views _

* No subfolder (directly in views )

- home.blade: The home page after login/registration.

- welcome.blade : Welcome the page that everyone can see, without needing to be a user.




*/ auth

- Everything in the auth folder is from the bootstrap - auth package. Register , serving to display the user registration and submission form the information. Similarly for login . I have not used verify . blade . php to require email confirmation . In the passwords subfolder neither are they
confirmation functionalities email , forgot password and password reset.


* / admin / products



- index . blade : A page with all products other than the one users see. There the admin can delete and edit all available products.

* / admin / users

- create . blade : User creation form page.

- edit.blade : A form page for editing a user.

- index .blade : Page with all users. There the admin can delete users or edit their data.


* / admin / categories

- A similar to user s , but for categories.






*/ components

- footer . blade : A reusable footer element.

*/ layouts

- app . blade : Includes all metadata to be used for all other views and navigation, which is also present on all pages. The links in the drop-down menu change depending on whether the current user is an admin or not. Only logged in users can access some of the links and only the admin can access links pointing to views in a folder admin ( ie to all links ) .

* / products


- index . blade : All created products are there. There is a category filter. Each product has an image, name, price and a view button , leading to / products / id , which is described below.

- create . blade : Page containing the product creation form. Only users with an account have access. All fillables can be specified properties mentioned above in the Product model , with the categories being 15 types, predefined . Users cannot create new categories. Images can also be uploaded.

-show . _ blade : Contains everything about the selected product – image, creator, category, price and description. May also contain delete buttons and edit , but only if that user is also the creator of the product.

- edit.blade : The page is accessible via edit button in show . blade , only for the user who added the product, allowing them to edit their product data.


3. Controllers



* AdminProductsController

 products ( Request $ request ) 
Retrieves all categories using Category :: all () and products based on the selected category.
 Uses conditional queries to filter products based on the selected category. 
Passes the filtered products, categories and selected category name to the admin view . products ".




* CategoryController

index :
         Category :: all ();: Uses Eloquent to retrieve all entries from the category table, storing them in the $ categories variable .
         return view (' admin . categories . index ', compact (' categories '));: Renders the view ' admin . categories . index ', passing the data for the categories to display.

     create :
         return view (' admin . categories . create ');: Renders the HTML view form (' admin . categories . create ') to create a new category .

    store :
        $ request -> validate ([...]);: Validates the incoming request data against specified rules, ensuring that the 'name' field is a required string with a maximum length of 255 characters and is unique in the 'categories' table.
         Category :: create ([...]);: Uses Eloquent to create a new category record in the database based on the validated query data.
         return redirect ()-> route (' admin . categories . index ')-> with (' success ', 'Category created successfully.');: Redirects user to and admin . categories . index with a success message.

     edit :
       $ category = Category :: findOrFail ( $ id );: Retrieves the category with the specified ID using Eloquent , assigning it to the variable $ category .
         return view (' admin . categories . edit ', compact (' category '));: Renders the view ' admin . categories . edit ', passing the edit category data.

     update :
       $ request -> validate ([...]);: Validates the incoming request data by ensuring that the updated field 'name' is a required string with a maximum length of 255 characters and is unique in the 'categories' table, except current category with the given identifier. 
$ category = Category :: findOrFail ( $ id );: Retrieves the category with the specified ID . 
$ category -> update ([...]);: Updates the category with the validated query data.
         return redirect ()-> route (' admin . categories . index ')-> with (' success ', 'Category updated successfully.');: Redirects user to admin . categories . index with a success message.


destroy : Category::findOrFail($id)->delete();: Uses Eloquent to find the category with the specified ID and deletes it from the database. return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');: Redirects user to and admin . categories . index with a success message indicating that the category has been deleted. 






* ProductController


index :

   Retrieves all categories from the categories table using Eloquent . 
Retrieves the " category " parameter from the query, defaulting to an empty string. 
Retrieves products based on the optional category filter using a conditional query with Eloquent . 
Renders the products view . index ', passing data about filtered products, categories and the selected category name. 

create : 

Retrieves all categories from the categories table using Eloquent . 
Renders the products view . create ', passing the category data to create a new product. 

store :

    Validates incoming request data against specified rules. 
Retrieves the authenticated user. Stores the uploaded product image in the “ public / images ” drive. 
Creates a new product associated with the authenticated user based on the validated request data. Redirects the user to products . index with a success message. 

show : 

Retrieves the product with the specified id using Eloquent . 
Retrieves the name of the user associated with the product. 
Renders the products view . show ', passing data about the product and the associated user. 

edit :

 Retrieves the product with the specified id using Eloquent . 
Retrieves all categories from the categories table using Eloquent . 
Renders the products view . edit ', passing data about the product and the categories to edit. 

update :

   Retrieves the product with the specified id using Eloquent . 
Validates incoming request data against specified rules. Updates the product details in the database based on validated query data. Checks if a new image is provided in the request. Deletes the old product image from the repository. Stores the new product image in the “ public / images ” drive. 
Updates the product image field in the database. Redirects the user to products . index with a success message. 

destroy :

   Retrieves the product with the specified id using Eloquent . 
Deletes the product image from the repository. Deletes the product from the database. Redirects the user to products . index with a success message.






* UserController : It deals with the management of administrative tasks related to users and products . 
User Management :

 index : 
Retrieves all users using User :: all (). 
Passes users data to the admin view . users “ using view (' admin . users ', compact (' users ')).

 create : 
Returns the view to create a new user (' admin . create - user ').

 store : 
Validates the incoming request details for 'name', 'email', 'password' and 'role'. Creates a new user using the verified login. Redirects back to admin . users . index with a success message.


 edit : 
Retrieves a specific user by ID using User :: findOrFail ( $ id ). 
Passes the user data to the admin view . users . edit , using view ( " aadmin . users . edit ", compact ( " user ")). 

u pdate : 
Validates the incoming request data for 'name' and 'email'. Updates the user's data based on the data provided. Redirects back to admin . users . index with a success message. 

d estroy : 
Deletes a user based on the supplied user ID. Redirects back to admin . users . index with a success message.


4. Routes (web.php file)

Auth Middleware Group: 

- The routes from this group are protected by auth middleware , ensuring that
only logged in users can access them.


/ products : Renders a list of products using index the method of
ProductController .
 /products/create: Renders the product creation form using
the create method of the ProductController.

POST / products : Handles the creation of a new product using the method
store from ProductController.

/products/{id}: Shows details about a specific product using the show method of the ProductController.

Routes in the 'checkProductOwnership' middleware group ensure that users have ownership or administrative rights before granting edit, update, and delete access. 


Admin Middleware Group : 

     The routers in this group are protected by both " auth " and " admin " middleware, restricting access to administrators.
     Rauts for admins:
         / admin / users : Displays a list of users using index from UserController .


/ admin / users /{ id }/ edit : Displays the user edit form ,
by using the edit method of the UserController .


        / admin / users / create : Shows a form to create a user using
 of the create method of the UserController.


         PUT /admin/users/{id}: Handles the update of user data using the update method of the UserController.



         POST / admin / users : Manages the creation of a new user with
using the store method of UserController .


         DELETE / admin / users /{ id }: Deletes a user via the destroyUser method of UserController .


             / admin / products : Displays a list of products in the admin panel using index from AdminProductsController .


     Routes for admin category:
        / admin / categories : Displays a list of categories using index from CategoryController .


         / admin / categories / create : Renders the form for creating a category using the create method of the CategoryController .


         POST / admin / categories : Handles the creation of a new category using the store method of the CategoryController .


         / admin / categories /{ id }/ edit : Shows the form to edit a category using the edit method of the CategoryController .



         PUT / admin / categories /{ id }: Handles updating the category details using the update method of the CategoryController .


         DELETE / admin / categories /{ id }: Deletes a category using the destroy method of CategoryController .




Built - in Auth Routes : 
Laravel-provided authentication routes, including login, registration, password reset, etc. These routes are automatically generated by Auth::routes(). 


Welcome Route : 

Displays the welcome page.


Home Route :

After login, it redirects to the home page using the method index from HomeController. 





