<?php
/*!
@mainpage

%Xyndravandria is the name of a collection of projects designed and developed by Mauro Di Girolamo (maurodigirolamo@web.de); he is therefore the copyright (c) owner of %Xyndravandria itself and all of its projects.

%Xyndravandria Mondraviel is released under the terms of the %Xyndravandria PHP License (XyndravandriaPHPLicense.txt). You should be given a copy of the %Xyndravandria PHP License (XyndravandriaPHPLicense.txt) within the same directory as the README.md; if not, you can get a copy at http://Xyndravandria.ohost.de/XyndravandriaPHPLicense.txt . There might be a release under a freer license for a later, more stable version.

All projects:

<table>

   <tr>
      <th>Project</th>
      <th>Language</th>
      <th>Description</th>
   </tr>
   
   <tr>
      <td>%Xyndravandria Averazain<br>http://github.com/MauroDiGirolamo/Xyndravandria_Averazain</td>
      <td>PHP</td>
      <td>Averazain is an Ajax framework supporting also JavaScript disabled clients perfectly - including search engines like Google.</td>
   </tr>
   <tr>
      <td>%Xyndravandria Dyverath<br>http://github.com/MauroDiGirolamo/Xyndravandria_Dyverath</td>
      <td>PHP</td>
      <td>Dyverath is a database access wrapper.</td>
   </tr>
   <tr>
      <td>%Xyndravandria Erozaver<br>http://github.com/MauroDiGirolamo/Xyndravandria_Erozaver</td>
      <td>PHP</td>
      <td>Erozaver is a class extending the type hinting given by the PHP engine (additional support for basic type hinting and size constraints).</td>
   </tr>
   <tr>
      <td>%Xyndravandria Mondraviel<br>http://github.com/MauroDiGirolamo/Xyndravandria_Mondraviel</td>
      <td>PHP</td>
      <td>Mondraviel is a class used to separate HTML from PHP code by firstly register models - files containing place holders embedded in HTML code - and then later fill them dynamically with content by passing values for the place holders.</td>
   </tr>
   
</table>

In the following, the usage of Mondraviel will be explained roughly; if you would like to know more detailled information, you can take a look at the in-depth documentation by browsing through either the namespaces or the data structures in the navigation above.

@section S1 I. Overview
Mondraviel is a class used to separate HTML from PHP code by firstly register models - files containing place holders embedded in HTML code - and then later fill them dynamically with content by passing values for the place holders.

@section S2 II. Models
A model is a file containing place holders embedded in HTML code. Place holders look like PHP variable, so they start with a leading $. @n
You have to use @ref Xyndravandria::Mondraviel::Mondraviel::RegisterModel( ) "Mondraviel::RegisterModel( )" to register a model. @n
Please read the documentation of @ref Xyndravandria::Mondraviel::Mondraviel::RegisterModel( ) "Mondraviel::RegisterModel( )" for more information.

@section S3 III. Filling a model
Use @ref Xyndravandria::Mondraviel::Mondraviel::FillModel( ) "Mondraviel::FillModel( )" to fill a model which has been registered earlier. You will be returned the combined content. @n
Of course, you can fill one and the same model with different values. The model itself will never be changed after it has been registered (unless you change the file used as a model). @n
Furthermore, you do not have to pass values for the place holders if you would just like to have a static HTML file as a model. @n
You should, additionally, read the documentation of @ref Xyndravandria::Mondraviel::Mondraviel::FillModel( ) "Mondraviel::FillModel( )" for details.

@section S4 IV. Example
@verbatim
<!--
##################
#   Index.html   #
##################
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
<html>

   <head>
      <title>
         $Title
      </title>
   </head>

   <body>
      $Body
   </body>
   
</html>
@endverbatim
<br>
@verbatim
<?php
#################
#   Index.php   #
#################
require_once( 'Xyndravandria/Mondraviel/Implement.php' );
use Xyndravandria\Mondraviel\Mondraviel;

Mondraviel::RegisterModel( 'Index.html' );

$Filling = array( 'Title' => 'Testing Mondraviel',
                  'Body' => 'This is a test.' );

echo Mondraviel::FillModel( 'Index', $Filling );
exit;
?>
@endverbatim
<br>
Output:
@verbatim
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
<html>

   <head>
      <title>
         Testing Mondraviel
      </title>
   </head>

   <body>
      This is a test.
   </body>
   
</html>
@endverbatim
*/
?>
