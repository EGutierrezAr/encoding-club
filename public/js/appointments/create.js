

let $teacher12;

  function selectFunction(val) {
    alert(val)
    d = document.getElementById(val).value;
    const url = `/students/52/${d}/assingTeacher`
    alert(url)
    document.getElementById("url12").href = url;

   // const specialtyId = $teacher12.val();
  };