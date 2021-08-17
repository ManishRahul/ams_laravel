# ams_laravel
### Admin assigns items to Employees
 **Once After importing the project from github,**
1. Run the below command to execute the seeder file to create 3 roles. Namely Admin, Manager and Employee.<br/>
	`php artisan db:seed` <br/>
2. run the project.<br/>
	`php artisan serve` <br/>
3. First login as an Admin with these credentels:
> username : **admin@gmail.com** <br/>
> password : **secretadmin**

4. After logining in the admin can perform several operations,
	- Register a user with a role by clicking on the **Register User**
		* as soon as registering, another form pops up where you can set the employee details for the user such as *phone number* etc..
	- Create a new product by going to **Add Product**
	- Assign multiple products to multiple employees by clicking on **All Products**
	- View all the employees : 	**View Employees**
	- finally, logout by clicking on the dropdown button at the top right corner.<br/>
<br/>
5. If an employee logs in, he can click on the **View Products** option and view the items assigned to him.
