<html>

<head>
  <title>Task List</title>
</head>

<body>
  <a href="/tasks/create">New Task</a>
  <table border="1">
    <thead>
      <tr>
        <th>id</th>
        <th>user id</th>
        <th>title</th>
        <th>desc</th>
        <th>due date</th>
        <th>priority</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
      <tr>
        <td>{{$task->id}}</td>
        <td>{{$task->user_id}}</td>
        <td>{{$task->title}}</td>
        <td>{{$task->description}}</td>
        <td>{{$task->due_date}}</td>
        <td>{{$task->priority}}</td>
        <td>{{$task->status}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
