<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Apply For Job</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/studentAppFormCSS.css" rel="stylesheet">
    </head>
    <body>
        <div class="form-style-5">
            <form method="POST" action="checkForm.php">
                <fieldset>
                    <legend id="title">Student Application Information Form</legend>
                        
                        <label for="department">Select desired department:</label>
                        <select id="department" name="department" >
                            
                            <?php
            
                                require_once('config.php');            
                                $query="SELECT * FROM COORDINATOR";
                                $result=mysql_query($query) or die ("Query to get data from APPLICATION failed: ".mysql_error());
                                
                                while ($row=mysql_fetch_array($result)) {
                                    $department=$row['DEPARTMENT'];
                                    echo "<option>
                                        $department
                                    </option>";
                                
                                }
                            ?>
                        </select>

                        <label for="coordinator">Select desired coordinator:</label>
                        <select id="coordinator" name="coordinator" >
                            
                            <?php
            
                                require_once('config.php');            
                                $query="SELECT * FROM COORDINATOR";
                                $result=mysql_query($query) or die ("Query to get data from APPLICATION failed: ".mysql_error());
                                
                                while ($row=mysql_fetch_array($result)) {
                                    $id=$row['ID'];
                                    $name=$row['NAME'];
                                    echo '<option value="'.$id.'">'
                                        .$name.
                                    '</option>';
                                
                                }
                            ?>
                        </select>
                        
                        <label for="company">Select desired company:</label>
                        <select id="company" name="company" >
                       
                            <?php
            
                                require_once('config.php');            
                                $query="SELECT * FROM APPLICATION";
                                $result=mysql_query($query) or die ("Query to get data from APPLICATION failed: ".mysql_error());
                                
                                while ($row=mysql_fetch_array($result)) {
                                    $id=$row['ID'];
                                    $company=$row['COMPANY'];
                                    $jobNum=$row['JOBAVAILABLE'];
                                    echo '<option value="'.$id.'">'
                                        .$company.
                                    '</option>';
                                
                                }
                            ?>

                        </select>

                        <label for="jobTitle">Select desired job:</label>
                        <select id="jobTitle" name="jobTitle" >
                            
                            <?php

                                require_once('config.php');            
                                $query="SELECT * FROM APPLICATION";
                                $result=mysql_query($query) or die ("Query to get data from APPLICATION failed: ".mysql_error());
                                
                                while ($row=mysql_fetch_array($result)) {
                                    $jobTitle=$row['JOBTITLE'];
                                    echo "<option>
                                        $jobTitle
                                    </option>";
                                
                                }
                            ?>
                        </select>

                        
                </fieldset>

                <input type="submit" value="Apply" />
            </form>
        </div>

    </body>
</html>

<script>
    document.getElementById("company").onchange = function()
    {
          var value = this.value;

    };  


</script>