<li class="nav-item dropdown">
    <?php if (isset($_SESSION['username'])): ?>
        <a class="nav-link dropdown-toggle text-white" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
           style="color: #fff; text-decoration: none; padding: 10px; display: flex; align-items: center;">
            <i class="fa fa-user-o"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown" 
             style="background-color: #000; border-radius: 5px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); min-width: 160px;">
            <a class="dropdown-item" href="profile.php" 
               style="color: #fff; padding: 12px; display: flex; align-items: center; text-decoration: none;">
                <i class="fa fa-user" style="margin-right: 10px;"></i> Mein Profil
            </a>
            <div class="dropdown-divider" style="background-color: rgba(255, 255, 255, 0.2); height: 1px;"></div>
            <a class="dropdown-item" href="logout.php" 
               style="color: #fff; padding: 12px; display: flex; align-items: center; text-decoration: none;">
                <i class="fa fa-sign-out" style="margin-right: 10px;"></i> Logout
            </a>
        </div>
    <?php else: ?>
        <a class="nav-link text-white" href="account.php">
            <i class="fa fa-user-o"></i> My Account
        </a>
    <?php endif; ?>
</li>