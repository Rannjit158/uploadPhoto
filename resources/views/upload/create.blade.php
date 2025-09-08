<!DOCTYPE html>
<html>
<head>
    <title>Upload Photo</title>
</head>
<body>
    <h2>Upload a Photo</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="photo">Choose a photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
