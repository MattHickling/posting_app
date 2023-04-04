<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Congrats you have logged in.</p>
    <form action="/logout" method="post">
        @csrf
        <button>Log out</button>
    </form>
        <div>
            <h2>Create a new post</h2>
            <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body" placeholder="body content..." id="" cols="30" rows="10"></textarea>
            <button>Save Post</button>
            </form>
        </div>

        <div>
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div>
                <h3>{{$post['title']}}</h3>
                <div>{{$post['body']}}</div>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
         
            </div>
            @endforeach
        </div>

    @else

    <div>
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
       </div>
       <h2>Login</h2>
       <form action="/login" method="post">
           @csrf
           <input name="loginname" type="text" placeholder="name">
           <input name="loginpassword" type="password" placeholder="password">
           <button>Login</button>
       </form>
      </div>

    @endauth
  
</body>
</html>