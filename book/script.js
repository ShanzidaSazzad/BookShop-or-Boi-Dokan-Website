

/* wirter page er script */

function showBio(name, bio) {
    document.getElementById('authorName').innerText = name;
    document.getElementById('authorBio').innerText = bio;
    document.getElementById('bioModal').style.display = 'block';
}
function closeBio() {
    document.getElementById('bioModal').style.display = 'none';
}


/*Order page er script */

document.addEventListener('DOMContentLoaded', function () {
    const orderIdField = document.getElementById('order_id');
    const orderId = 'ORD' + Math.floor(100000 + Math.random() * 900000);
    orderIdField.value = orderId;
  });
  