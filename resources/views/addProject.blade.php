<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project - Dotogether</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">

    <style>
       
        .container_1 {
            max-width: 600px;
            background: white;
            padding: 20px;
           
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        center{
            margin-bottom:80px;
        }
    </style>
</head>
<body>
    
    @extends('layout')
    @section('addproject')
    <center><div class="container_1">
        <h2 class="text-center mb-4">Add Your Project</h2>
        <form action="add_project" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <label for="projectTitle" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="projectTitle" placeholder="Enter project title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="projectDescription" class="form-label">Short Description</label>
                <textarea class="form-control" id="projectDescription" rows="3" placeholder="Enter a short description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="projectLanguage" class="form-label">Project Language</label>
                <input type="text" class="form-control" id="projectLanguage" placeholder="Enter project language" name="language" required>
            </div>
            <div class="mb-3">
                <label for="fileUpload" class="form-label">Upload File (PDF, PPT, DOCX)</label>
                <input type="file" class="form-control" id="fileUpload" accept=".pdf,.ppt,.pptx,.doc,.docx" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit Project</button>
        </form>
    </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>
</html>
