<div class="rowRight">
      <div class="columnRight">
        <!-- LOGOUT -->
        <div class="logout">
          <form action="logout.php" method="post" enctype="multipart/form-data">
            <button id="logout-button" onclick="document.location='login.php'">Logout</button>
        </div>
        <!-- SEARCH BAR -->
        <div class="search-container">
          <!-- ALTERNATIVA ??? -->
          <form method="post" action="procura.php">
            <!-- <input class="search-box" type="text" name="search" id="search-input" placeholder="Procura por NIF" 
                required> -->
          </form>
          <form class="form-inline" method="post" action="procura.php">
            <input type="text" name="search" class="search-box" placeholder="Procura por NIF" id="search-input">
            <!--  <button type="submit" name="save" class="btn btn-primary">Search</button> -->
          </form>
        </div>
      </div>
      <div class="calendar-container">
        <!-- CALENDAR -->
        <div class="calendar"></div>
      </div>
    </div>