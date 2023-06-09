<html>

<head>
  <title>Create New Task</title>
</head>

<body>
  <h1>Form Task</h1>
  <form action="/tasks" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="1">
    <label for="formTaskTitle">Title</label>
    <input type="text" name="title" id="formTaskTitle">
    <br>
    <label for="formTaskDesc">Description</label>
    <input type="text" name="description" id="formTaskDesc">
    <br>
    <label for="formTaskDueDate">Due Date</label>
    <input type="date" name="due_date" id="formTaskDueDate">
    <br>
    <label for="formTaskPriority">Priority</label>
    <input type="text" name="priority" id="formTaskPriority">
    <br>
    <label for="formTaskStatus">Status</label>
    <input type="text" name="status" id="formTaskStatus">
    <br>
    <button type="reset">Reset</button>
    <button type="submit">Submit</button>
  </form>
</body>

</html>
