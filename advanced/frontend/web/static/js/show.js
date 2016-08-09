function Refresh() {
	var newDate = new Date();
	document.getElementById('time_label').innerText = newDate.toLocaleString();
}
var interval = setInterval("Refresh()", 1000);

/*$.ajax({
	url:"/person/all",
	type:"GET",
	data:"json",
	success:function(response, status, xhr) {
		var name = response.name;
		var age = response.age;
		var pagination = response.pagination;
		var persons = response.persons;

		for (var i = 0; i < persons.length; i++) {
			$(".information tbody").append('<tr><td>'+i+'</td><td><img src="'+persons[i].imageFile+'"/></td><td>'+persons[i].name+'</td><td>'+persons[i].gender+'</td><td>'+persons[i].age+'</td><td><a href="/person/to-update?_id='+persons[i]._id+'"><img src="/static/images/user_modify_32px_556807_easyicon.net.png" class="operation-modify"></a><a href="/person/del?_id='+persons[i]._id+'"><img src="/static/images/Delete_group_32px_1186690_easyicon.net.png" class="operation-delete"></a></td></tr>');
		}

	}
});
*/