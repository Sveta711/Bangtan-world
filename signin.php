<!--<!DOCTYPE html>
<html>
<head>
    <style>
      
:root {
    --branch-dark: #1a1a1a;
    --branch-grey: #f4f4f4;
    --branch-text-muted: #666;
    --branch-accent: #3d4a3e; 
    --white: #ffffff;
}

body {
    font-family: 'Inter', -apple-system, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
   

.login-container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
}

.login-box {
    background: var(--white);
    padding: 40px;
    border: 2px solid #cd58cf;; 
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    border-radius:15px;
}

.login-header h2 {
 color: #cd58cf;
     font-size: 24px;
    font-weight: 500;
    margin-bottom: 8px;
    text-align: center;
}

.login-header p {
    color: var(--branch-text-muted);
    font-size: 14px;
    margin-bottom: 30px;
    text-align: center;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--branch-dark);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.input-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 2px;
    box-sizing: border-box;
    font-size: 14px;
    transition: border-color 0.2s;
}

.input-group input:focus {
    outline: none;
    border-color: #cd58cf;
}

.actions {
    margin-bottom: 20px;
    text-align: right;
}

.forgot-password {
    font-size: 13px;
    color: var(--branch-text-muted);
    text-decoration: underline;
}
.forgot-password:hover{
    color: rgb(182, 120, 182);
}

.btn-primary {
    width: 100%;
    padding: 14px;
    background-color: #cd58cf;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: opacity 0.2s;
}

.btn-primary:hover {
    opacity: 0.9;
    background-color: rgb(182, 120, 182);
}

.footer-link {
    margin-top: 25px;
    text-align: center;
    font-size: 14px;
    color: var(--branch-text-muted);
}

.footer-link a {
    color: var(--branch-dark);
    font-weight: 600;
    text-decoration: none;
}
      </style>
      </head>
      <body>
        <div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please enter your details to sign in.</p>
        </div>
        
        <form method="post" action="login_action.php">
            <div class="input-group">
                <label for="email">Username</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password"  required>
            </div>
            <?php 
   // session_start();
   // if(isset($_SESSION['login_error'])): ?>
        <p style="color:red; font-size:12px;"><?php //echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
    <?//php endif; ?>
            
            <div class="actions">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn-primary">Sign In</button>
            
            <div class="footer-link">
                Don't have an account? <a href="account.php">Create one</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Bangtan World</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
:root {
    --bts-purple: #cd58cf;
    --bts-purple-dark: #2a083b;
    --bts-purple-glow: #e070e2;
    --bts-light: #f5e6ff;
    --white: #ffffff;
}

* {
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', -apple-system, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    /* BTS-ի ֆոնային նկարը և մանուշակագույն քողը */
    background: linear-gradient(135deg, rgba(20, 5, 30, 0.75), rgba(60, 15, 80, 0.70)),
                url('images/bts.jpg') no-repeat center center fixed;
    background-size: cover;
}

.login-container {
    width: 100%;
    max-width: 420px;
    padding: 20px;
}

.login-box {
    /* Glassmorphism թափանցիկ ապակյա էֆեկտ */
    background: rgba(25, 10, 35, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 40px 35px;
    border: 2px solid rgba(205, 88, 207, 0.6);
    box-shadow: 0 0 30px rgba(205, 88, 207, 0.35),
                inset 0 0 15px rgba(205, 88, 207, 0.15);
    border-radius: 20px;
}

.login-header h2 {
    color: var(--bts-purple-glow);
    font-size: 28px;
    font-weight: 600;
    margin: 0 0 8px 0;
    text-align: center;
    text-shadow: 0 0 10px rgba(224, 112, 226, 0.5);
    letter-spacing: 0.5px;
}

.login-header p {
    color: var(--bts-light);
    font-size: 14px;
    margin-bottom: 30px;
    text-align: center;
    opacity: 0.85;
}

.input-group {
    margin-bottom: 22px;
}

.input-group label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--bts-light);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.input-group input {
    width: 100%;
    padding: 13px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(205, 88, 207, 0.4);
    border-radius: 8px;
    box-sizing: border-box;
    font-size: 14px;
    color: var(--white);
    transition: all 0.3s ease;
}

.input-group input::placeholder {
    color: rgba(245, 230, 255, 0.5);
}

.input-group input:focus {
    outline: none;
    border-color: var(--bts-purple-glow);
    background: rgba(255, 255, 255, 0.18);
    box-shadow: 0 0 12px rgba(224, 112, 226, 0.5);
}

.actions {
    margin-bottom: 22px;
    text-align: right;
}

.forgot-password {
    font-size: 13px;
    color: var(--bts-light);
    text-decoration: none;
    transition: color 0.2s;
    opacity: 0.8;
}

.forgot-password:hover {
    color: var(--bts-purple-glow);
    text-decoration: underline;
    opacity: 1;
}

.btn-primary {
    width: 100%;
    padding: 15px;
    background: linear-gradient(45deg, #cd58cf, #9b4bd8);
    color: var(--white);
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(205, 88, 207, 0.4);
}

.btn-primary:hover {
    background: linear-gradient(45deg, #e070e2, #b15be6);
    box-shadow: 0 0 20px rgba(224, 112, 226, 0.7);
    transform: translateY(-2px);
}

.footer-link {
    margin-top: 25px;
    text-align: center;
    font-size: 14px;
    color: var(--bts-light);
    opacity: 0.85;
}

.footer-link a {
    color: var(--bts-purple-glow);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.footer-link a:hover {
    color: var(--white);
    text-shadow: 0 0 8px var(--bts-purple-glow);
}

.error-msg {
    color: #ff6b81;
    background: rgba(255, 0, 50, 0.15);
    border: 1px solid rgba(255, 0, 50, 0.3);
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
    margin-bottom: 15px;
    text-align: center;
}
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please enter your details to sign in.</p>
        </div>
        
        <form method="post" action="login_action.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <?php if(isset($_SESSION['login_error'])): ?>
                <div class="error-msg">
                    <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
                </div>
            <?php endif; ?>
            
            <div class="actions">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn-primary">Sign In</button>
            
            <div class="footer-link">
                Don't have an account? <a href="account.php">Create one</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>