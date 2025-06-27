const swal = {
  loginSuccessful: function () {
    Swal.fire({
      icon: 'success',
      title: 'Login Successful',
      text: 'Welcome back!',
      background: '#1e1e1e',        // 深色背景
      color: '#ffffff',             // 字体颜色
      iconColor: '#00ff99',         // 图标颜色（可选）
      showConfirmButton: false,
      timer: 1200
    }).then(() => {
        window.location.href = "index.php";
    });
  },
  loginFailed: function (message = 'Invalid credentials. Please try again.') {
    Swal.fire({
      icon: 'error',
      title: 'Login Failed',
      text: message,
      background: '#1e1e1e',
      color: '#ffffff',
      iconColor: '#ff5555',
      confirmButtonColor: '#d33'
    });
  },
  Successful: function () {
    Swal.fire({
      icon: 'success',
      title: 'Update Successful',
      text: 'Password Update Successful!',
      background: '#1e1e1e',        // 深色背景
      color: '#ffffff',             // 字体颜色
      iconColor: '#00ff99',         // 图标颜色（可选）
      showConfirmButton: true,
  });
  },
  inputFailed: function (message = 'Invalid credentials. Please try again.') {
    Swal.fire({
      icon: 'error',
      title: 'Input Error',
      text: message,
      background: '#1e1e1e',
      color: '#ffffff',
      iconColor: '#ff5555',
      confirmButtonColor: '#d33'
    });
  },
  successMBTI: function (message='message',title="success") {
    Swal.fire({
      icon: 'success',
      title: title,
      text: message,
      background: '#1e1e1e',        // 深色背景
      color: '#ffffff',             // 字体颜色
      iconColor: '#00ff99',         // 图标颜色（可选）
      showConfirmButton: true,
  }).then(() => {
    location.reload();
  });
  },
  error: function (message = 'Error Message',title='Error') {
    Swal.fire({
      icon: 'error',
      title: title,
      text: message,
      background: '#1e1e1e',
      color: '#ffffff',
      iconColor: '#ff5555',
      confirmButtonColor: '#d33'
    });
  },
 
};


function editdb(filename) {
    $.ajax({
        url: 'API/editFileStatus.php',
        type: 'POST',
        data: { filename: filename, status: 'completed' },
        success: function (res) {
            console.log('DB updated:', res); // 可选调试
        },
        error: function () {
            console.error('Failed to update DB status');
        }
    });
}

function queueCall(fileName, callback) {
    const formData = new FormData();
    formData.append("filename", fileName);
    $.ajax({
        url: "API/queue.php",  // 你的 PHP API 地址
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status === 'completed') {
                editdb(fileName); 
                callback(true);
            } else if (response.status === 'queued' || response.status === 'processing') {
                callback(false);
            } else {
                swal.error(response.message,"Error");
                callback(false);
            }
        },
        error: function () {
            swal.error("无法连接 PHP API", "❌ Server Error");
            callback(false);
        }
    });
}

function replaceProcessing(filename) {
    const $processing = $('.processing[data-value="' + filename + '"]');
    const viewBtn = `
        <a href="mbti_result.php?file=${encodeURIComponent(filename)}"
           class="login-btn btn-sm btn-success"
           target="_blank">📄 View</a>
    `;
    $processing.replaceWith(viewBtn);
}

$(document).ready(function () {
  const $menu = $('#profileMenu');

  $('#profileButton').on('click', function (e) {
    e.stopPropagation();

    if ($menu.is(':visible')) {
      // 淡出 + 上移
      $menu.css({ opacity: 0, transform: 'translateY(-10px)' });
      setTimeout(() => $menu.hide(), 300);
    } else {
      // 显示 + 动画初始化
      $menu.show();
      setTimeout(() => {
        $menu.css({ opacity: 1, transform: 'translateY(0)' });
      }, 10); // 等待渲染
    }
  });

  // 点击外部隐藏菜单
  $(document).on('click', function (e) {
    if (!$(e.target).closest('#profileMenu, #profileButton').length) {
      $menu.css({ opacity: 0, transform: 'translateY(-10px)' });
      setTimeout(() => $menu.hide(), 300);
    }
  });
});
