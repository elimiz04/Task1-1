# ShopBy

### Introduction:
ShopBy is a PHP web application that offers consumers an online platform to browse and buy different alcohol goods. The system is made up of a number of PHP scripts that may be used to register accounts, modify account information, add and remove products from the application, and list quantity amounts. I created a page on alcohol that would display the things that customers may buy. In order to allow users to add items to their carts and then change the amount they add, I also included a button for further information. After doing those actions, I was able to include an admin login tab. The admin would be able to add and remove items after logging in. 


#### Features

1. User Authentication:
   - Lets users log in using a username and password.
   - Checks against a MySQL database for authentication.

2. Product Listing:
   - Displays alcohol products with essential details like price and images.

3. Shopping Cart:
   - Allows users to add products to their cart.
   - Convenient interface to edit quantities and proceed to checkout.

4. Checkout Process:
   - Collects customer order information

#### Installation

1. Set up
 Web Server:
   - Use PHP and MySQL on PHPMyAdmin.

2. Import Database:
   - Import `admin.sql` file into your MySQL database.

3. Update Database Connection:
   - Modify credentials in `includes/config.php` and added current task name.

#### Usage

1. Access Application:
   - Through your web server.

2. User Actions:
   - Register, log in, and browse alcohol products.
   - Add products to cart 

#### Folder Structure

- `includes/`: Configuration files, database scripts, and functions.
- `style.css`: Stylesheet for the application.
- `index.php`: Main page displaying alcohol products.
- `product_detail.php`: Detailed information about a product.
- `checkout.php`: Checkout process.
- `README.md`: Documentation.

#### Dependencies

- PHP
- MySQL
- Bootstrap 

#### Additional Functionalities

1. User Profile Editing (`edit_profile.php`):
   - Edit name, surname, and email.
   - Updates both the database and session.

2. Admin Dashboard (`index.php`):
   - Carousel of images.
   - Role and product management for admins.

3. User Registration and Login (`signup.php`, `login.php`):
   - Register and log in with email and password.

4. Product Detail Page (`product_detail.php`):
   - View detailed product information.
   - Add product to the shopping cart.

5. Shopping Cart (`addToCart.php`):
   - Add products to the cart.
   - Retrieve product information from product detail page.

6. Product Management (`productPage.php`):
   - Admins can manage products (create, edit, delete).

7. Role-Based Access (`productPage.php`):
   - Access management based on user roles.

8. Styling (`style.css`):
   - Styles for a visually appealing interface.

9. User Profile Page (`profile.php`):
    - Displays user profile information.

10. Role Management Page (`rolesPage.php`):
    - Manages user roles.

11. Signup Page (`signup.php`):
    - Allows users to sign up.

12. CSS Styling (`style.css`):
    - Styles for HTML elements.

13. Navigation:
    - Links for page navigation.

14. Footer:
    - Includes a styled footer.
