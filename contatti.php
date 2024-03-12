<!DOCTYPE html>
<html>
<head>
    <title>Contatti</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="mostre.php">Mostre</a></li>
                <li><a href="contatti.php">Contatti</a></li>
            </ul>
        </nav>

    <div class="container">
        <h1>Contatti</h1>
        <p>Insert your contact form or contact information here.</p>
        
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Form</h2>
                <form action="process_contact.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Contact Information</h2>
                <p>Insert your contact information here.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2020 Museo Virtuale</p>
</body>
</html>