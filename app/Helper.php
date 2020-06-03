<?php 



	 function createFlash()
   {
	session()->flash('message',' A Receipe Created');

   }

   function  updateFlash()
   {
      session()->flash('message','A Receipe Edited');
   }
   
   function deleteFlash()
   {
   	session()->flash('message','A Receipe Deleted ');
   }


