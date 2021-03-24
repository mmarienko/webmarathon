function getFormattedDate(dateObject) {
  if (!dateObject.getDate()) {
    return -1;
  }

  return (
    (dateObject.getDate() < 10
      ? "0" + dateObject.getDate()
      : dateObject.getDate()) +
    "." +
    (dateObject.getMonth() + 1 < 10
      ? "0" + (dateObject.getMonth() + 1)
      : dateObject.getMonth() + 1) +
    "." +
    dateObject.getFullYear() +
    " " +
    (dateObject.getHours() < 10
      ? "0" + dateObject.getHours()
      : dateObject.getHours()) +
    ":" +
    (dateObject.getMinutes() < 10
      ? "0" + dateObject.getMinutes()
      : dateObject.getMinutes()) +
    " " +
    new Intl.DateTimeFormat("en-US", { weekday: "long" }).format(dateObject)
  );
}

