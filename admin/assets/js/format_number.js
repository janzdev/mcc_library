function formatPhoneNumber(value) {
     if (!value) return value;
     const phoneNumber = value.replace(/[^\d]/g, '');
     const phoneNumberLength = phoneNumber.length;
     if (phoneNumberLength < 4) return phoneNumber;
     if (phoneNumberLength < 11) {
          return `(+${phoneNumber.slice(0, 2)}) ${phoneNumber.slice(2)}`;
     }
     return `(+${phoneNumber.slice(0, 2)}) ${phoneNumber.slice(2, 6)}-${phoneNumber.slice(6, 9)}-${phoneNumber.slice(9, 11)}`;
}


function studentFormatEdit() {

     const studentEditNumber = document.querySelector('.student_number');
     const formattedStudentNumber = formatPhoneNumber(studentEditNumber.value);
     studentEditNumber.value = formattedStudentNumber;
}
function ContactFormatEdit() {

     const ContactEditNumber = document.querySelector('.contact_person_number');
     const formattedContactNumber = formatPhoneNumber(ContactEditNumber.value);
     ContactEditNumber.value = formattedContactNumber;
}