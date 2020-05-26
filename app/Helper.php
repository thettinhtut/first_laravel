<?php 



	 function createFlash()
{
	session()->flash('createmess',' Created Successfully');

}

   function  updateFlash()
   {
   	session()->flash('editmess','A Receipe Edited');
   }


   function deleteFlash()
   {
   	session()->flash('deletemess','A Receipe Deleted ');
   }


