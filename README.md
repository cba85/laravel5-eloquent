# Laravel Eloquent

> For demonstration purpose only

## Etapes

### 1. Insert

```
$ php artisan make:auth
$ php artisan migrate

$ php artisan make:model Phone -m
```

### 2. Reverse relationship

### 3. Unique token

```
$ php artisan make:model Token -m
$ php artisan migrate
```

- Change RegisterController

```
$ php artisan make:controller Mailing\\SubscriptionController
```

### 4. Many topics

```
$ php artisan make:model Topic -m
$ php artisan migrate

$ php artisan make:controller TopicController

$ php artisan make:controller UserTopicController
```

### 5. Many posts

```
$ php artisan make:model Post -m
$ php artisan migrate

$ php artisan make:controller UserPostController
```

### 6. Database default columns name

### 7. Implementation (many to many)

```
$ php artisan make:model Category -m
$ php artisan make:model Product -m
$ php artisan migrate

$ php artisan make:migration create_category_product_table --create=category_product
$ php artisan migrate

$ php artisan make:controller CategoryController

$ php artisan make:controller ProductController
$ php artisan migrate
```

### 8. Pivot

```
$ php artisan make:migration add_created_at_to_category_product_table --table=category_product
$ php artisan make:migration add_visible_to_category_product --table=category_product
$ php artisan migrate
```

### 9. Has many through

```
$ php artisan make:migration add_group_id_to_users --table=users
$ php artisan migrate

$ php artisan make:model Group -m
$ php artisan make:model Theme -m
$ php artisan migrate

$ php artisan make:controller GroupController
```

### 10. SQL views

```
$ php artisan make:model Company -m
$ php artisan migrate

$ php artisan make:migration create_company_user_table --create=company_user
$ php artisan migrate

$ php artisan make:model Project -m
$ php artisan migrate

$ php artisan make:controller UserCompanyController
```

```sql
CREATE VIEW user_names_view as select name from users
```

```sql
CREATE VIEW user_company_project_view AS
SELECT company_user.user_id, company_user.company_id, projects.id AS project_id
FROM company_user
LEFT JOIN projects ON company_user.user_id = projects.company_id
```

```
$ php artisan make:migration create_user_company_project_view_view
$ php artisan migrate

$ php artisan make:controller ProjectController
```

### 11. Polymorphic relationships

```
$ php artisan make:model Article -m
$ php artisan make:model Video -m

$ php artisan make:controller ArticleController
$ php artisan make:controller VideoController

$ php artisan make:model Comment -m

$ php artisan make:provider EloquentServiceProvider

$ php artisan make:controller CommentController
```

### 12. Many to many polimorphic relationships

```
$ php artisan make:model Subject -m
$ php artisan make:model Lesson -m
$ php artisan make:model Tag -m

$ php artisan make:migration create_taggables_table --create=taggables

$ php artisan make:controller LessonController

$ php artisan make:controller TagController
```
