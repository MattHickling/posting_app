<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posting App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    @auth
    <p>Congrats you have logged in.</p>
    <form action="/logout" method="post">
        @csrf
        <button class="logout">Log out</button>
    </form>
        <div>
            <h2>Create a new post</h2>
            <form id="create" action="/create-post" method="post">
            @csrf
            <input id="createInput" type="text" name="title" placeholder="Post title....">
            <textarea name="body" placeholder="What do you want to say..." id="" cols="30" rows="10"></textarea>
            <button>Save Post</button>
            </form>
        </div>

        <div>
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div>
            <h3 id="allPostsTitle" >Title: {{$post['title']}} <span>by {{$post->user->name}}</span></h3>
            <div id="allPostsBody" class="post-body">{{$post['body']}}</div>
            <div class="post-buttons">
                <a id="editButton" href="/edit-post/{{$post->id}}">Edit</a>
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
          <button class="btn">Register</button>
        </form>
      </div>
      
      <h2>Login</h2>
      <form action="/login" method="post">
        @csrf
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button class="btn">Login</button>
      </form>
      
      </div>

    @endauth
  
</body>
</html>