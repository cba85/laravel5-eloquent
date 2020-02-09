<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Phone;
use App\Topic;
use App\Post;
use App\Product;
use App\Article;
use App\Video;
use App\Comment;
use App\Lesson;
use App\Subject;
use App\Tag;

Route::get('/', function (Request $request, Phone $phone, Topic $topic) {
    // 1. Insert
    //dd($request->user());
    //dd($request->user()->phone);
    //dd($request->user()->phone()->get());
    /*
    // Fillable
    $request->user()->phone()->create([
        'phone_number' => '0123456789'
    ]);
    */
    //dd($request->user()->phone);
    //dd($request->user()->phone()->get());
    /*
    $phone = $phone->find(1);
    $phone->update([
        'phone_number' => '0123456789'
    ]);
    */
    /*
    // Reverse relation
    $phone = new Phone;
    $phone->phone_number = "0123456789";
    $phone->user()->associate($request->user());
    $phone->save();
    */

    // 2. Reverse relationship
    //$phone = $phone->find(1);
    //$phone = $phone->where('phone_number', '0123456789')->first(); // Pas get
    //dd($phone);
    //echo $phone->user->name;
    //$phones = $phone->all();
    //echo $phones;
    //return view('phone.index', compact('phones'));

    // 3. Unique token
    //echo $request->user()->token->token;

    // 4. Many topics
    /*
    $topic = new Topic;
    $topic->title = 'Topito';
    $topic->user()->associate($request->user());
    $topic->save();
    */

    // 5. Many posts
    $topic = $topic->find(2);
    // Doesn't work
    /*
    $topic->posts()->create([
        'body' => 'Reply 1'
    ]);
    */
    // Doesn't work
    /*
    $post = new Post;
    $post->body = 'Reply 1';
    $post->user()->associate($request->user());
    $post->topic()->associate($topic);
    $post->save();
    */
    // Doesn't work
    /*
    $post = new Post;
    $post->body = 'Reply 1';
    $post->user()->associate($request->user());
    $topic->post()->save($post);
    */
});

// 3. Unique token
Route::get('/mailing/unsubscribe/{token}', 'Mailing\SubscriptionController@unsubscribe');

// 4. Many topics
Route::get('/topics', 'TopicController@index')->name('topics.index');
Route::get('/topics/{topic}', 'TopicController@show')->name('topics.show');
Route::get('/user/topics', 'UserTopicController@index')->name('user.topics.index');
Route::get('/topics/{topic}/delete', 'TopicController@delete')->name('topics.delete');
Route::get('/topics/{topic}/update', 'TopicController@update')->name('topics.update');

// 5. Many posts
Route::get('/topics/{topic}/posts', 'PostController@store');
Route::get('/user/posts', 'UserPostController@index')->name('user.posts.index');
Route::get('/posts', 'PostController@index')->name('posts.index');

// 7. Many to many
Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/product/store', 'ProductController@store');
Route::get('/product/{product}/update', 'ProductController@update');
Route::get('/category/{category}/update', 'CategoryController@update');

// 8. Pivot
Route::get('product/update-pivot', function(Product $product) {
    // Doesn't work
    $p = $product->find(2);
    //$c = $category->find(2);
    $product->categories()->orWherePivot('visible', false)->updateExistingPivot(2, [
        'visible' => true
    ]);
});

// 9. Has Many Through
Route::get('/groups/{group}', 'GroupController@show');

// 10. SQL Views
Route::get('user/companies', 'UserCompanyController@index');
Route::get('user/projects', 'ProjectController@index');

// 11. Polymorphism
Route::get('articles/{article}', 'ArticleController@show')->name('article.show');
Route::get('videos/{video}', 'VideoController@show')->name('video.show');
Route::get('/comment', function(Request $request, Article $article) {
    $a = $article->find(1);
    $comment = new Comment;
    $comment->body = "Hum ça marche";
    $comment->user()->associate($request->user());
    $a->comments()->save($comment);
});
Route::get('/video', function(Request $request, Video $video) {
    $v = $video->find(1);
    $comment = new Comment;
    $comment->body = "SNCF";
    $comment->user()->associate($request->user());
    $v->comments()->save($comment);
});
Route::get('user/comments', 'CommentController@index');

// 12. Many to may polymorphism
Route::get('lessons/{lesson}', 'LessonController@show');
Route::get('lessons', 'LessonController@index');
Route::get('lesson', function() {
    $lesson = new Lesson;
    $lesson->title = "New lesson";
    $lesson->save();
    $tags = Tag::find([1, 2]);
    $lesson->tags()->sync($tags);
});
Route::get('lesson/update', function() {
    $lesson = Lesson::find(3);
    //$tags = Tag::whereIn('slug', ['Python'])->get();
    //$tags = Tag::find([1]);
    $lesson->tags()->sync([3]);
});
Route::get('lesson/delete', function() {
    $lesson = Lesson::find(1);
    $tags = Tag::find([1]);
    $lesson->tags()->detach($tags);
});
Route::get('tags/{tag}', 'TagController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
