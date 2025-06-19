import { DataTable } from 'simple-datatables';
document.addEventListener("DOMContentLoaded", () => {
  const el = document.querySelector("#user-table");
  if (el) new DataTable(el, {
    perPage: 10,
    firstLast: true,
    searchable: true,
    sortable: true,
  });
});
