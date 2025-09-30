$.ajax({
    url: "../controller/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_appointment" },
    dataType: "json",
    success: function (res) {
        if (res.status === 200) {
            $('#appointmentTableBody').empty();

            if (res.data.length > 0) {
                res.data.forEach(data => {

                    // Status color logic
                    let statusColor = '';
                    if (data.prod_qty > 10) {
                        statusColor = 'bg-green-600';
                    } else if (data.prod_qty > 0 && data.prod_qty <= 10) {
                        statusColor = 'bg-yellow-500';
                    } else {
                        statusColor = 'bg-red-600';
                    }

                    $('#appointmentTableBody').append(`
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-2 font-medium text-gray-700">${data.reference_number}</td>
                            <td class="px-4 py-2 text-gray-600">${data.appointmentDate} ${data.appointmentTime}</td>
                            <td class="px-4 py-2">
                                <span class="capitalize px-2 py-1 rounded-full text-white text-xs ${statusColor}">
                                    ${data.status}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <button class="seeDetailsBtn bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition"
                                    data-appointment_id='${data.appointment_id}'>
                                    <span class="material-icons text-sm align-middle">visibility</span> See Details
                                </button>
                                <button class="cancelBtn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                                    data-appointment_id='${data.appointment_id}'>
                                    <span class="material-icons text-sm align-middle">cancel</span> Cancel
                                </button>
                            </td>
                        </tr>
                    `);
                });
            } else {
                $('#appointmentTableBody').append(`
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-400 italic">
                            No record found
                        </td>
                    </tr>
                `);
            }
        }
    }
});







  // Search filter
  $('#searchInput').on('input', function () {
    const term = $(this).val().toLowerCase();
    $('#appointmentTableBody tr').each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(term));
    });
  });
