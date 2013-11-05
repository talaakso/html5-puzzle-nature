html5-puzzle-nature
===================

Simple html 5 / KineticJs puzzle game with top 10 -list and jqgrid admin table

IMPORTANT SECURITY NOTE:

directory src/admin SHOULD ALWAYS BE PASSWORD PROTECTED. This directory is used to store and
manage top 10 (sqlite) database through jqgrid table on page src/admin/index.php.

If you feel unsecure about using top 10 list on your server then database/admin/top 10 -section
can easily be removed by:

1) Don't copy admin subdirectory to your server
2) On src/index.php source code (less than 1000 lines with all javascript/html/css) comment all
calls for all function calls: 

parseTop(selName);
saveTop(selName, selImage, name, score);

(only few places).

Main purpose to add top 10 -list was to show a simple way to add password protected admin 
section with sqlite database and jqgrid table. This basic admin section with little modifications
could be used to for instance to administrate sqlite data send by public html forms.

By no means, this admin section is not meant to teach anything about web security. 
I am not security expert and even if I was, by showing "how things are done" 
I would only undermine that security solution. 

If you add admin directory to your server in public section at least password protect admin directory.
I also strongly recommend to use some of your own technique to add extra security to database access.
I AM NOT ACCOUNTABLE FOR ANY DAMAGES DONE BY USING MY CODE.

INSTALLATION:

1) create subdirectory html5-puzzle-nature/admin to your web server space.
The base directory can be named differently (not necessarily html5-puzzle-nature).

2) If this directory is in public section of your web pages then password protect
this admin directory by htaccess or some other technique. The base directory of this
game (or any other directiries) should be public is free access of the game is wanted.

3) Copy all the files in src directory (and sub directories) to directory html5-puzzle-nature.

4) If you want to by security or other reasons to remove top 10/admin -section then do not
transfer admin directory to your server and follow notes in the above IMPORTANT SECURITY NOTE
-section. In this case few modifications to src/index.php source code are needed.

The simples and the most secure solution is to install the whole directory structure inside
password protected intra section of your sercer space.

When installation is completed the application should look and function the same way
as the demo page below:

DEMO:

http://www.talaakso.fi/html5-puzzle-nature/

POSSIBLE USES OF THIS CODE:

- To study the code in the file src/index.php to found out how to create 
Javascript/html5/KineticJS game in with basic html/css -styling in some
1000 lines of code.,

- To study how to create a simple password protected admin/sqlite/jqgrid section to 
your web page. These kind of solutions can be used to manage data collected on 
html forms. However, you should strongly consider adding you own security solutions
on top of this basic solution.

- Use the code with minimal modifications to create you own puzzles to you home
page. In this case you need to

1) Transfer your own images (smaller than about 700px in larger dimension) to subdirectory
html5-puzzle-nature/gfx

2) Connect the images to game by adding html select list option to the select list
found at the end section of file src/index.php.
Example:

<option value='Rapadalen;./gfx/Rapadalen.jpg;4;4'>Rapadalen</option>

3) Modify the option attribute value by using the following ;-separated syntax:

image_name;image_path_on_server;grid_width;grid_height

4) Remove the unwanted images (options).

5) For the first select list option you need to adjust the following (easily found)
initialization parameters to match the ones given in first options value attribute
Example:

selX     = 4;
selY     = 4;
selName  = "Rapadalen";
selImage = "./gfx/Rapadalen.jpg";

Also the image location in 

if( imlocation == null ) {
	imageScr = "./gfx/Rapadalen.jpg";
}

should be changed.

After these modifications the puzzle game should function exactly as before but with
your own images. If you have your images processed and ready then this could be
done in a few minutes.

BUGS:

The puzzle pieces do not always go to right places while playing the game.
This does not affect the ability to complete the puzzle.

If I remember correctly I have found some fix (should be esily fixed) to this
problem, but I didn't fully understand to cause of this bug.
Feel free to send fix for this bug and I will promise to add it to this code.

IN CONCLUSION:

I do not have any plans to update this code other than some minor bug fixes.
I have already done modification to this code to be used in sami language teaching,
but these modifications are not updated here. This code is meant to provide
quite well tested base structure for html 5 desktop/tablet drag-and-drop puzzle
games. Also clickable puzzles and image piece animations (as shown at the 
start or the puzzle game) can achieved with this technique.

I hope you have fun with experimenting with my code and puzzle games.
This code can freely be used in any NON-COMMERCIAL manner.
If you want to use this code commercially then please contact me on my email.

In any case, if you use this code on your own projects, I would be more than glad
to see the results. 






































