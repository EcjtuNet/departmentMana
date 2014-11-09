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
	//考勤
	$('tbody').on('click','span',  function () {
		var obj = $(this);
		var td  = obj.parent();
		var type = obj.attr('class').split(' ');
		!type[1] ? type[1] = 'add' : type[1] = 'del';
		//Ajax 请求url
		var preurl = 'operation.php';
		var postdata = $.param({
			'submit': type[0] + type[1],
			'user': td.siblings().children('a.name').text()
		}, true);
		$.post(preurl, postdata,  function (data) {
			var data = $.parseJSON(data);
			var number = obj.text().substring(1);
			if (data) {
				if (data != (number - 1)) {
					number ++;
					obj.addClass('add').text('+' + number);
				} else {
					number --;
					obj.removeClass('add').text('+' + number);
				}
			}
			return false;
		});
	});
	//增加成员
	$('#add').on('click', function () {
		var newMember = '<div id="#addMember"><input type="text" placeholder="新成员姓名">' +
			'<button id="addBtn" type="button" class="btn">确定</button>' +
			'<button id="addCancleBtn" type="button" class="btn">取消</button></div>';
		var dropdown = $('.dropdown');
		dropdown.prepend(newMember);
		dropdown.find('input').focus();
		dropdown.find('#addCancleBtn').on('click', function () {
			dropdown.find('div').fadeOut(100);
		});
	});
	$('.dropdown').delegate('#addBtn', 'click',  function () {
		var name = $(this).siblings('input').val();
		var alertBox = $('.alert');
		var postdata = $.param({
			'submit': 'add',
			'user'  : name
		}, 'true');
		alertBox.slideDown(100);
		$.post('operation.php', postdata, function (data) {
			if (data.toUpperCase() === 'OKADD') {
				var newtr = 
					'<tr>' +
						'<td><div class="checkdiv"></div></td>' +
						'<td><a class="name" href="person.php?user=' + name + '">' + name + '</a></td>' +
						'<td><span class="uarrive">+0</span></td>' +
						'<td><span class="vacate">+0</span></td>' +
						'<td><span class="late">+0</span></td>' + 
						'<td><span class="arrive">+0</span></td>' + 
						'<td>0</td>' +
					'</tr>';
				$('tbody').append(newtr);
				alertBox.text('已添加，确认请查看列表');
			} else if (data === '用户名已存在') {
				alertBox.text('成员已存在');
			}
		});
	});
	//删除成员
	$('#del').on('click', function () {
		var markList = $('td div.checkmark');
		var nameList = [];
		//删除成员URL
		var delUrl = 'operation.php';
		var postdata;
		var alertBox = $('.alert');
		alertBox.slideDown(100);
		for (var i = markList.length - 1; i >= 0; i--) {
			nameList[i] = markList.eq(i).parent().parent().find('a').text();
			postdata = $.param({
				'submit': 'del',
				'user'  : nameList[i]
			}, true);
			$.post(delUrl, postdata, function (data) {
				if (data.toUpperCase() === 'OKDEL') {
					markList.parent().parent().hide();
					alertBox.text('已成功删除');
				}
			});
		}
	});
	//添加积分
	$('#update').on('submit', function () {
		event.preventDefault();
		var alertBox = $('.alert');
		alertBox.slideDown(100);
		$.post('operation.php', $(this).serialize() + '&submit=update', function (data) {
			if (data.toUpperCase() === 'OKUPDATE') {
				$('input').val('');
				alertBox.text('提交成功！');
			} else {
				alertBox.text('失败了... T^T');
			}
		});
	});
});