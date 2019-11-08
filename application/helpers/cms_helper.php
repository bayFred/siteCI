<?php

function btn_edit($uri = NULL){

	//return anchor($uri, '<i class="icon_edit">edit</i>');<span class="glyphicon glyphicon-edit"></span>	
	return anchor($uri, '<button type="button" class="btn btn-default btn-sm text-center"><span class="glyphicon glyphicon-edit" ></span>');	
}
function btn_delete($uri = NULL){

	return anchor( $uri, '<span class="glyphicon glyphicon-remove"></span>', array(
		'onclick' => "return confirm('You are about to delete a record.This can not be undown.Are you sure?');"
	));
}