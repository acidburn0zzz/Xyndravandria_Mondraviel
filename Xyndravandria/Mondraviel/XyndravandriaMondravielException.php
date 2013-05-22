<?php
/*
=============================================================================================================================================
|   This file is part of a project released under the terms of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt).                 |
|                                                                                                                                           |
|   You should be given a copy of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt) within the same directory as the README.md;   |
|   if not, you can get a copy at http://Xyndravandria.ohost.de/XyndravandriaPHPLicense.txt .                                               |
|                                                                                                                                           |
|   The copyright (c) of this project is owned by Mauro Di Girolamo <maurodigirolamo@.web.de>.                                              |
============================================================================================================================================|



Xyndravandria Mondraviel
------------------------
Alpha 0.0.0

Xyndravandria is the name of a collection of projects designed and developed by Mauro Di Girolamo (maurodigirolamo@web.de); he is therefore the copyright (c) owner of Xyndravandria itself and all of its projects.

Xyndravandria Mondraviel is released under the terms of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt). You should be given a copy of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt) within the same directory as the README.md; if not, you can get a copy at http://Xyndravandria.ohost.de/XyndravandriaPHPLicense.txt . There might be a release under a freer license for a later, more stable version.

The documentation is either included in ./admin_media/Documentation/ or can be read at http://Xyndravandria.ohost.de/Mondraviel/Documentation/.

All projects:

   Xyndravandria Averazain
   http://github.com/MauroDiGirolamo/Xyndravandria_Averazain
   PHP
   Averazain is an Ajax framework supporting also JavaScript disabled clients perfectly - including search engines like Google.
   
   Xyndravandria Dyverath
   http://github.com/MauroDiGirolamo/Xyndravandria_Dyverath
   PHP
   Dyverath is a database access wrapper.
   
   Xyndravandria Erozaver
   http://github.com/MauroDiGirolamo/Xyndravandria_Erozaver
   PHP
   Erozaver is a class extending the type hinting given by the PHP engine (additional support for basic type hinting and size constraints).
   
   Xyndravandria Mondraviel
   http://github.com/MauroDiGirolamo/Xyndravandria_Mondraviel
   PHP
   Mondraviel is a class used to separate HTML from PHP code by firstly register models - files containing place holders embedded in HTML code - and then later fill them dynamically with content by passing values for the place holders.
*/

namespace Xyndravandria\Mondraviel;

/// An Exception thrown by Mondraviel.
/// @abstract
class XyndravandriaMondravielException extends \Exception {
   
}
?>