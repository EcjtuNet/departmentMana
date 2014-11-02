$(document).ready(function () {
	//选中
	$('.checkdiv').on('click', function() {
		!$(this).hasClass('checkmark') ?
			$(this).addClass('checkmark') :
			$(this).removeClass('checkmark');
	});
	//登录框
	$('#loginModal').modal({
		show: false,
		backdrop: false
	});
	//加分
	$('td span').on('click', function () {
		var type = $(this).parent().attr('class');
		var obj = $(this);
		//Ajax 请求url
		var url = '';
		$.get(url, function (data) {
			obj.text(data);
		});
	});
	//增加成员
	$('#add').on('click', function () {
		var newMember = '<div><form action=""><input type="text" placeholder="新成员姓名">' +
			'<button id="addBtn" type="submit" class="btn">确定</button>' +
			'<button id="addCancleBtn" type="button" class="btn">取消</button></form></div>';
		var dropdown = $('.dropdown');
		dropdown.prepend(newMember);
		dropdown.find('input').focus();
		dropdown.find('#addCancleBtn').on('click', function () {
			dropdown.find('div').fadeOut(100);
		});
	});
	//删除成员
	$('#del').on('click', function () {
		var markList = $('td div.checkmark');
		var nameList = [];
		//删除成员URL
		var delUrl = '';
		$('.alert').slideDown(100);
		for (var i = markList.length - 1; i >= 0; i--) {
			nameList[i] = markList.eq(i).next().children('a').text();
		}
		$.post(delUrl, {name: nameList}, function (data) {
			if (data.state === 'success') {
				markList.parent().parent().hide();
				$('.alert').hide();
			}
		});
	});
});