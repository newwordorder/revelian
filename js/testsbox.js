class testsBox {
  constructor(data) {
    this.initialData = Object.values(data.tests);
    this.data = Object.values(data.tests);
    this.activePage = 0;
    this.pagination = [];
    this.mapped = this.prepareData(this.data);
    this.pageSetup(this.mapped);
    this.selectorSetup();
    this.searchSetup();
    this.clearbtnSetup();
    this.copySetup();
  }

  pageSetup(data) {
    this.isMultiPage(data)
      ? this.singlePageSetup(data)
      : this.multiPageSetup(this.chunkArray(data, 20));
  }

  singlePageSetup(data) {
    data.forEach(b => testsbox.insertAdjacentHTML("beforeend", b));
  }

  multiPageSetup(data) {
    this.paginationSetup(data);

    this.addToTestBox(this.prepareArrayForPrinting(data[this.activePage]));
  }

  paginationSetup(data) {
    this.resetPagination();

    const nextPage = this.getActivePage() + 1;
    const previousPage = this.getActivePage() - 1;

    const buttons = () => {
      if (this.getNumberOfPages() != 1) {
        if (this.getActivePage() === 0) {
          return `<li class="page-item"><a class="page-link page-link--nonlink">Page ${this.getActivePage() +
            1} of ${this.getNumberOfPages()}</a></li><li id="pageNo--${nextPage}" class="page-item"><a class="page-link">Next</a></li>`;
        } else if (
          this.getActivePage() ===
          this.chunkArray(this.mapped, 20).length - 1
        ) {
          return `<li id="pageNo--${previousPage}" class="page-item"><a class="page-link">Previous</a></li><li class="page-item"><a class="page-link page-link--nonlink">Page ${this.getActivePage() +
            1} of ${this.getNumberOfPages()}</a></li>`;
        } else {
          return `<li id="pageNo--${previousPage}" class="page-item"><a class="page-link">Previous</a></li><li class="page-item"><a class="page-link page-link--nonlink">Page ${this.getActivePage() +
            1} of ${this.getNumberOfPages()}</a></li><li id="pageNo--${nextPage}" class="page-item"><a class="page-link">Next</a></li>`;
        }
      } else {
        return ``;
      }
    };

    this.pagination.push(buttons());
    this.addContent({ id: pageList, array: this.pagination });

    Array.from(pageList.children).map(a =>
      a.addEventListener("click", () => {
        this.navigateTo(a.id.split("--")[1]);
      })
    );
  }

  paginationUpdate(data) {
    this.resetPagination();

    const nextPage = this.getActivePage() + 1;
    const previousPage = this.getActivePage() - 1;

    const buttons = () => {
      if (this.getNumberOfPages() != 1) {
        if (this.getActivePage() === 0) {
          return `<li class="page-item"><a class="page-link page-link--nonlink">Page ${this.getActivePage() +
            1} of ${this.getNumberOfPages()}</a></li><li id="pageNo--${nextPage}" class="page-item"><a class="page-link">Next</a></li>`;
        } else if (
          this.getActivePage() ===
          this.chunkArray(this.mapped, 20).length - 1
        ) {
          return `<li id="pageNo--${previousPage}" class="page-item"><a class="page-link">Previous</a></li><li class="page-item"><a class="page-link page-link--nonlink">Page ${this.getActivePage() +
            1} of ${this.getNumberOfPages()}</a></li>`;
        } else {
          return `<li id="pageNo--${previousPage}" class="page-item"><a class="page-link">Previous</a></li><li class="page-item"><a class="page-link page-link--nonlink">Page ${this.getActivePage() +
            1} of ${this.getNumberOfPages()}</a></li><li id="pageNo--${nextPage}" class="page-item"><a class="page-link">Next</a></li>`;
        }
      } else {
        return ``;
      }
    };

    this.pagination.push(buttons());
    this.addContent({ id: pageList, array: this.pagination });

    Array.from(pageList.children).map(a =>
      a.addEventListener("click", () => {
        this.navigateTo(a.id.split("--")[1]);
      })
    );
  }

  getNumberOfPages() {
    const no = this.chunkArray(this.mapped, 20).length;
    return no;
  }

  getActivePage() {
    return parseInt(this.activePage);
  }

  addContent({ id, array }) {
    const a = this.prepareArrayForPrinting(array);
    id.insertAdjacentHTML("beforeend", a);
  }

  prepareArrayForPrinting(a) {
    return a.join("");
  }

  chunkArray(array, chunk_size) {
    const results = [];
    const myArray = this.cloneArray(array);
    while (myArray.length) {
      results.push(myArray.splice(0, chunk_size));
    }
    return results;
  }

  prepareData(data) {
    return data.map((a, index) => this.mapData(a, index));
  }

  mapData(data, index) {
    return `<div class="card my-2">
       <div class="card-header" id="heading${index}" data-toggle="collapse" data-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
         <p class="mb-0 dropdownTitle">
               ${data.title}
         </p>
         <div class="d-none row align-items-center justify-content-between d-sm-flex">
         <h6 class="category mb-0 px-4">${data.category}</h6>
         <h6 class="mb-0 px-4"><i class="far fa-clock"></i><span style="font-weight:bold;" class="px-2">${
           data.completeTime
         }</span></h6>
         <h6 class="mb-0 px-4"><i class="fas fa-hashtag"></i><span style="font-weight:bold;" class="px-2">${
           data.questions
         }</span></h6>
         </div>
       </div>
       <div id="collapse${index}" class="collapse" aria-labelledby="heading${index}" data-parent="#accordionExample">
         <div class="card-body">
            <div class="d-flex row align-items-center justify-content-between p-2">
              <p class="mb-0 px-2"><b>Time to Complete: </b><span class="px-2">${
                data.completeTime
              }</span></p>
              <p class="mb-0 px-2"><b>Number of Questions: </b><span class="px-2">${
                data.questions
              }</span></p>
              <p class="mb-0 px-2"><b>Language: </b> <span class="px-2">${this.dataUs(
                data.us
              )} </span></p>
            </div> 
            <p class="description"><b>Description: </b><br />${
              data.description
            }</p>
            <div class="btn btn--solid copybtn" 
              data-content="<h4>${data.title}</h4>
                <br />
                <b>Category:</b> ${data.category} 
                <br />
                <b>Time to complete:</b> ${data.completeTime}
                <br />
                <b>No. of questions:</b> ${data.questions} 
                <br />
                <b>Language:</b> ${this.dataUs(data.us)}
                <br />
                <b>Description: </b> ${
                  data.description
                }"><i class="far fa-copy"></i> Copy</div>
            </div>
         </div>
         </div>
   `;
  }

  dataUs(bool) {
    return bool ? "English (US)" : "English (UK)";
  }

  isMultiPage(array) {
    array.length <= 20;
  }

  addToTestBox(page) {
    testsbox.insertAdjacentHTML("beforeend", page);
  }

  togglePageList(list) {
    list.map(a => a.classList.remove("activePage"));
    const active = list.filter(a => a.id === `pageNo--${this.activePage}`)[0];
    active.classList.add("activePage");
  }

  navigateTo(index) {
    if (index != this.activePage) {
      this.activePage = index;
      this.togglePageList(this.listObjects());
      controls.scrollIntoView();
      this.paginationUpdate(this.chunkArray(this.mapped, 20));
      testsbox.innerHTML = this.prepareArrayForPrinting(
        this.chunkArray(this.mapped, 20)[this.activePage]
      );
    }
  }

  listObjects() {
    return Array.from(pageList.children);
  }

  selectorSetup() {
    const categories_all = this.initialData.map(a => a.category);
    const categories = [...new Set(categories_all)];
    const selectObjects = categories.map(
      a => `<option value="${a}">${a}</option>`
    );

    selectObjects.forEach(a => category.insertAdjacentHTML("beforeend", a));

    category.addEventListener("change", e => {
      if (category.value === "all") {
        if (category.classList.contains("active")) {
          category.classList.remove("active");
          selectwrapper.classList.remove("active");
        }
      } else {
        category.classList.add("active");
        selectwrapper.classList.add("active");
      }

      const newList = this.categoryFilter(category.value);
      if (newList.length > 0) {
        this.updateList(newList);
      } else {
        this.emptyList();
      }
    });
  }

  updateList(data) {
    this.resetPagination();
    this.resetResults();
    this.activePage = 0;

    this.data = data;

    this.mapped = this.prepareData(data);
    this.pageSetup(this.mapped);
    this.copySetup();
  }

  emptyList() {
    this.resetPagination();
    this.resetResults();
    this.activePage = 0;
    console.log("no values");
    this.addToTestBox(
      '<div class="my-4"><h4 class="text-center">No tests found</h4></div>'
    );
  }

  resetPagination() {
    pageList.innerHTML = "";
    this.pagination = [];
  }

  resetResults() {
    testsbox.innerHTML = "";
  }

  categoryFilter(value) {
    if (search.value === "") {
      if (value === "all") {
        return this.initialData;
      } else {
        return this.initialData.filter(a => a.category === category.value);
      }
    } else {
      if (value === "all") {
        const searchResults = this.search(this.initialData, search.value);
        return searchResults;
      } else {
        const categorydata = this.initialData.filter(
          a => a.category === category.value
        );
        const searchResults = this.search(categorydata, search.value);
        return searchResults;
      }
    }
  }

  searchSetup() {
    searchbtn.addEventListener("click", () => {
      const value = search.value;
      if (value != "") {
        const searchValues = this.search(this.data, value);
        if (searchValues.length > 0) {
          this.updateList(searchValues);
        } else {
          this.emptyList();
        }
      } else {
        const newList = this.categoryFilter(category.value);
        this.updateList(newList);
      }
    });

    search.addEventListener("input", e => {
      if (e.key === "Enter") {
        const value = search.value;
        if (value != "") {
          const searchValues = this.search(this.data, value);
          if (searchValues.length > 0) {
            this.updateList(searchValues);
          } else {
            this.emptyList();
          }
        } else {
          const newList = this.categoryFilter(category.value);
          this.updateList(newList);
        }
      }
      if (search.value != "") {
        if (!search.classList.contains("active")) {
          search.classList.add("active");
        }
      } else {
        if (search.classList.contains("active")) {
          search.classList.remove("active");
        }
      }
    });
  }

  search(data, searchValue) {
    var options = {
      keys: ["title"]
    };
    var fuse = new Fuse(data, options);
    return fuse.search(searchValue);
  }

  reset() {
    this.emptyList();
    category.value = "all";
    category.setAttribute("selected", "");
    search.value = "";
    if (search.classList.contains("active")) {
      search.classList.remove("active");
    }
    if (category.classList.contains("active")) {
      category.classList.remove("active");
      selectwrapper.classList.remove("active");
    }

    const newList = this.categoryFilter(category.value);
    if (newList.length > 0) {
      this.updateList(newList);
    } else {
      this.emptyList();
    }
  }

  clearbtnSetup() {
    clearbtn.addEventListener("click", () => {
      this.reset();
    });
  }

  copyToClipboard(str) {
    function listener(e) {
      e.clipboardData.setData("text/html", str);
      e.clipboardData.setData("text/plain", str);
      e.preventDefault();
    }
    document.addEventListener("copy", listener);
    document.execCommand("copy");
    document.removeEventListener("copy", listener);
  }

  copySetup() {
    const buttons = document.querySelectorAll(".copybtn");
    buttons.forEach(button =>
      button.addEventListener("click", () => {
        this.copyToClipboard(button.dataset.content);
        button.innerHTML = "Copied!";
        setTimeout(() => {
          button.innerHTML = `<i class="far fa-copy"></i> Copy`;
        }, 1000);
      })
    );
  }

  cloneArray(array) {
    return array.slice(0);
  }
}
