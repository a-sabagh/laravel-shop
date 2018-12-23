<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>upload excel</title>
   </head>
   <body>
      <form action="" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="file" name="course">
         <input type="submit" name="upload" value="Import">
      </form>
   </body>
</html>

