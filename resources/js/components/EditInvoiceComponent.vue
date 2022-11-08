<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="mb-5">Add New Invoice</h3>
                <div class="row" v-if="errorMessage">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ errorMessage }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="select-block" v-on:click="selectClient()" v-if="!client.id">
                            Select Client
                        </div>
                        <div v-if="client.id">
                            <h5>{{ client.name }} <i class="fa fa-pencil text-danger cpointer"
                                    @click="selectClient()"></i></h5>
                            {{ client.mobile }}<br />
                            {{ client.address }}<br />
                            {{ client.email }}
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="select-block" v-on:click="selectCompany()" v-if="!company.id">
                            Select Company
                        </div>
                        <div v-if="company.id">
                            <h5>{{ company.name }} <i class="fa fa-pencil text-danger cpointer"
                                    @click="selectCompany()"></i></h5>
                            {{ company.mobile }}<br />
                            {{ company.address }}<br />
                            {{ company.email }}
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-4">
                                <label for="vendor_id">Select Vendor</label>
                            </div>
                            <div class="col-md-8">
                                <!-- @change="selectVendor($event)" -->
                                <select v-model="form.vendor" id="vendor_id" class="form-control">
                                    <option value="" selected>Select Vendor</option>
                                    <option v-for="(vendor, index) in vendors" :key="index + '-' + vendor.id"
                                        :value="vendor.id">
                                        {{ vendor.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-4">
                                <label for="refer_id">Select Reference</label>
                            </div>
                            <div class="col-md-8">
                                <select v-model="form.refer" id="refer_id" class="form-control">
                                    <option value="" selected>Select Reference</option>
                                    <option v-for="(refer, index) in clients" :key="index + '-' + refer.id"
                                        :value="refer.id">
                                        {{ refer.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-4">
                                <label for="period">Time Period</label>
                            </div>
                            <div class="col-md-8">
                                <select v-model="form.period" id="period" class="form-control">
                                    <option value="" selected>Select Period</option>
                                    <option value="3">3 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="12">12 Months</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">

                    <div class="col-3">
                        <strong>Add New Service:</strong>
                        <select class="form-control" @change="selectedService($event)">
                            <option disabled value="" selected>Please Select Service</option>
                            <option v-for="(service, index) in allServices" :key="index + '-' + service.id"
                                :value="service.id">
                                {{ service.name }}
                            </option>
                        </select>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Name</th>
                                <th width="40%">Detail</th>
                                <th width="20%">Amount</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='(service, index) in services' :key="index">
                                <td>
                                    <div v-html="service.id"></div>
                                </td>
                                <td>
                                    <div v-html="service.name"></div>
                                </td>
                                <td>
                                    <div v-html="service.detail"></div>
                                    <!-- <textarea v-model="service.detail" class="form-control" id="detail" cols="30" rows="3"></textarea> -->
                                </td>
                                <td>
                                    <!-- Rs. <span v-html="service.price"></span> -->
                                    <input v-model="service.price" class="form-control" type="number" />
                                </td>
                                <td>
                                    <i @click="deleteRow(index)" class="feather icon-trash"
                                        style="font-size:25px;color:red;cursor:pointer"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-2 text-right">Other Details </div>
                    <div class="col-8">
                        <textarea v-model="form.detail" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <label for="discount">Discount</label>
                        <input id="discount" type="number" v-model="discount" class="form-control" />
                        <h4>Total: PKR {{ totalAmount }}/-</h4>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-success" :disabled="isDisableSaveButton" @click="saveInvoice()">
                        <span>Update</span>
                        <div class="d-flex justify-content-center" v-if="loader">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="row" v-if="errorMessage">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ errorMessage }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Popup -->
        <div v-if="showModal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <div class="modal-body">
                            <div class="d-flex justify-content-center" v-if="loader">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="close-btn" @click="showModal = false">
                                <i class="feather icon-x"></i>
                            </div>
                            <div v-if="selectClientBlock">
                                <input type="text" class="form-control" v-model="search_client"
                                    placeholder="Search Client..." />
                                <div class="list-group">
                                    <a v-for="(client, index) in filteredClients" :key="index + '-' + client.id"
                                        @click="selectClientSingle(client.id, index)" href="#"
                                        class="list-group-item list-group-item-action">
                                        {{ client.id }}. {{ client.name }}
                                    </a>
                                </div>
                            </div>
                            <div v-if="selectCompanyBlock">
                                <div class="list-group">
                                    <a v-for="(company, index) in companies" :key="index + '-' + company.id"
                                        @click="selectCompanySingle(company.id, index)" href="#"
                                        class="list-group-item list-group-item-action">
                                        {{ company.id }}. {{ company.name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['invoiceId'],
    data() {
        return {
            search_client: '',
            dialog: false,
            showModal: false,
            loader: false,
            selectClientBlock: false,
            selectCompanyBlock: false,
            message: null,
            vendors: [],
            companies: [],
            clients: [],
            discount: 0,
            form: {
                period: "",
                vendor: "",
                refer: "",
                detail: ''
            },
            client: {
                id: "",
                name: "",
                mobile: "",
                address: "",
                email: "",
            },
            company: {
                id: "",
                name: "",
                mobile: "",
                address: "",
                email: "",
            },
            allServices: {},
            services: [],
            errorMessage: "",
            // isDisableSaveButton: false,
        };
    },
    computed: {
        totalAmount() {
            let sum = 0;
            for (let i = 0; i < this.services.length; i++) {
                sum += (parseFloat(this.services[i].price));
            }

            return sum - Number(this.discount);
        },
        isDisableSaveButton() {
            if (this.client.id && this.company.id && this.form.vendor && this.form.period && (this.services.length > 0) && (this.totalAmount > 0)) {
                return false;
            }
            return true;
        },
        filteredClients() {
            return this.clients.filter(client => {
                return client.name.toLowerCase().includes(this.search_client.toLowerCase())
            })
        }
    },
    watch: {},
    created() {
        this.getAll();
        this.getInvoice();
    },
    methods: {
        getInvoice(){
            let vm = this;
            axios
                .get("/admin/get/invoice/" + vm.invoiceId)
                .then(function (response) {
                    if (response.status === 200) {
                        vm.client = response.data.invoice.client;
                        vm.company = response.data.invoice.company;
                        vm.form.vendor = response.data.invoice.vendor_id;
                        vm.form.period = response.data.invoice.period;
                        vm.form.refer = response.data.invoice.refer_id;
                        vm.services = response.data.invoice.services;
                        vm.form.detail = response.data.invoice.detail;
                        vm.discount = response.data.invoice.discount;
                        console.log(response.data.invoice);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getAll(){
            let vm = this;
            axios
                .get("/admin/get/all")
                .then(function (response) {
                    if (response.status === 200) {
                        //   console.log(response.data);
                        vm.vendors = response.data.vendors;
                        vm.companies = response.data.companies;
                        vm.clients = response.data.clients;
                        vm.allServices = response.data.services;
                    }
                })
                .catch(function (error) {
                    console.log("error");
                });
        },
        selectClient() {
            let vm = this;
            vm.showModal = true;
            vm.selectClientBlock = true;
        },
        selectClientSingle(cId, index) {
            let vm = this;
            axios
                .get("/admin/get/client/" + cId)
                .then(function (response) {
                    if (response.status === 200) {
                        // console.log(response.data);
                        vm.client.id = response.data.client.id;
                        vm.client.name = response.data.client.name;
                        vm.client.mobile = response.data.client.mobile;
                        vm.client.address = response.data.client.address;
                        vm.client.email = response.data.client.email;
                        vm.showModal = false;
                        vm.selectClientBlock = false;
                    }
                })
                .catch(function (error) {
                    console.log('error');
                });
        },
        selectCompany() {
            let vm = this;
            vm.showModal = true;
            vm.selectClientBlock = false;
            vm.selectCompanyBlock = true;
        },
        selectCompanySingle(cId, index) {
            let vm = this;
            axios
                .get("/admin/get/company/" + cId)
                .then(function (response) {
                    if (response.status === 200) {
                        // console.log(response.data);
                        vm.company.id = response.data.company.id;
                        vm.company.name = response.data.company.name;
                        vm.company.mobile = response.data.company.mobile;
                        vm.company.address = response.data.company.address;
                        vm.company.email = response.data.company.email;
                        vm.showModal = false;
                        vm.selectCompanyBlock = false;
                    }
                })
                .catch(function (error) {
                    console.log('error');
                });
        },
        // @selectVendor($event)
        // selectVendor(event) {
        //   console.log(event.target.value);
        //   this.form.vendor = event.target.value;
        // },
        getService(id) {
            let vm = this;
            axios
                .get("/admin/get/service/" + id)
                .then(function (response) {
                    if (response.status === 200) {
                        vm.services.push({
                            id: response.data.service.id,
                            name: response.data.service.name,
                            detail: response.data.service.detail,
                            price: response.data.service.price
                        })
                        // console.log(response.data.service);
                    }
                })
                .catch(function (error) {
                    console.log('error');
                });
        },
        saveInvoice() {
            let vm = this;
            if (!vm.client.id) {
                vm.errorMessage = "Select Client Details";
            } else if (!vm.company.id) {
                vm.errorMessage = "Select Sister Company";
            } else if (!vm.form.vendor) {
                vm.errorMessage = "Select Vendor";
            } else if (!vm.form.period) {
                vm.errorMessage = "Select Time Period";
            } else if (vm.services.length < 1) {
                vm.errorMessage = "Select Service";
            } else if (vm.totalAmount < 0) {
                vm.errorMessage = "Refresh Page";
            } else {
                vm.loader = true;
                // vm.isDisableSaveButton = true;
                axios
                    .post("/admin/update/invoice", {
                        invoice_id: vm.invoiceId,
                        client: vm.client.id,
                        company: vm.company.id,
                        vendor: vm.form.vendor,
                        period: vm.form.period,
                        refer: vm.form.refer,
                        discount: vm.discount,
                        total: vm.totalAmount,
                        services: vm.services,
                        detail: vm.form.detail,
                    })
                    .then(function (response) {
                        if (response.status === 200) {
                            vm.errorMessage = response.data.message;
                            //   window.location.reload();
                            window.location.href = "/admin/invoices";
                            // console.log(response.data);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                vm.loader = false;
            }
        },
        selectedService(event) {
            this.getService(event.target.value);
        }
    },
};
</script>

<style lang="scss" scoped>
.list-group {
    display: block;
    overflow: auto;
    width: 100%;
    height: 300px;
}

.select-block {
    display: block;
    width: 100%;
    min-height: 100px;
    background-color: aliceblue;
    text-align: center;
    line-height: 100px;
    border: 1px solid #d2e2ec;
    border-radius: 6px;
    cursor: pointer;

    &:hover {
        background-color: #d2e2ec;
        border: 1px solid #96bad0;
        color: #000;
    }
}

.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* max-height: 95vh; */
    background-color: rgba(30, 30, 30, 0.9);
    display: table;

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;

        // vertical-align: top;
        .modal-container {
            width: 500px;
            max-height: 100vh;
            overflow: auto;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #f5f7f8;

            //   height: 100%;
            .modal-body {
                position: relative;
                padding: 1.5rem 10px;
                flex: 1 1 auto;
            }
        }
    }

    .close-btn {
        position: absolute;
        top: -10px;
        right: -20px;
        font-size: 18px;
        cursor: pointer;
        color: red !important;
        padding: 1px 1px 0px 4px;

        &:hover {
            color: #363f44 !important;
            border-radius: 100%;
        }
    }
}
</style>
