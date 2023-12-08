
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card text-black">
                <div class="card-body">
                  <h4 class="card-title">Monthly Statistics</h4>
                  <div class="row mt-5">
                    <div class="col-6">
                      <div class="wrapper">
                        <h5 class="mb-1">Bounce Rate</h5>
                        <h4 class="mb-1"><strong>23.32%</strong></h4>
                        <small class="mb-0 mt-3 text-danger">2.7% increased</small>
                      </div>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                      <div class="wrapper">
                        <h5 class="mb-1">Page Views</h5>
                        <h4 class="mb-1"><strong>42.32%</strong></h4>
                        <small class="mb-0 mt-3 text-primary">1.5% decreased</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="chart-container">
                  <canvas id="chart-activity" height="250"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin d-flex align-items-stretch">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Revenue</h4>
                      <div class="row d-flex justify-content-between align-items-end mb-3">
                        <div class="col-5">
                          <p class="mb-0">Purchases</p>
                          <h4 class="mb-0"><strong>20.89%</strong></h4>
                        </div>
                        <div class="col-7">
                          <div class="float-right">
                            <div id="purchase-chart">
                              6, 5, 7, 10, 9, 3, 5, 9, 7, 3, 5 ,2, 5, 7, 6, 8, 6, 3, 9, 7, 9, 2, 8
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row d-flex justify-content-between align-items-end">
                        <div class="col-5">
                          <p class="mb-0">Time on site</p>
                          <h4 class="mb-0"><strong>83.32%</strong></h4>
                        </div>
                        <div class="col-7">
                          <div class="float-right">
                            <div id="time-chart">
                              6, 5, 7, 10, 3, 9, 5, 9, 7, 9, 5 ,2, 5, 7, 9, 8, 6, 11, 9, 7, 7, 6, 5
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body py-4">
                      <h4 class="card-title">Revenue</h4>
                      <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-6 col-md-6 grid-margin grid-margin-md-0 d-flex flex-column align-items-center justify-content-center">
                          <div class="w-75 mx-auto">
                            <div id="revenueCircle1" class="progressbar-js-circle"></div>
                          </div>
                          <p class="mb-0 mt-2">Sales</p>
                          <h4 class="mb-0"><strong>65.00%</strong></h4>
                        </div>
                        <div class="col-6 col-md-6 grid-margin grid-margin-md-0 d-flex flex-column align-items-center justify-content-center border-left">
                          <div class="w-75 mx-auto">
                            <div id="revenueCircle2" class="progressbar-js-circle"></div>
                          </div>
                          <p class="mb-0 mt-2">Purchases</p>
                          <h4 class="mb-0"><strong>80.26%</strong></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Rating</h4>
                  <h6 class="text-muted text-center mb-1">Average Rating 4.0</h6>
                  <div class="d-flex justify-content-center">
                    <select id="star-rating" name="rating">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <table class="table table-borderless mt-3">
                    <tbody>
                      <tr>
                        <td class="p-0 text-gray"><small class="mr-1">1</small><span>★</span></td>
                        <td class="w-100">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 7%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="p-0"><small class="text-gray">7</small></td>
                      </tr>
                      <tr>
                        <td class="p-0 text-gray"><small class="mr-1">2</small><span>★</span></td>
                        <td class="w-100">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 27%" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="p-0"><small class="text-gray">27</small></td>
                      </tr>
                      <tr>
                        <td class="p-0 text-gray"><small class="mr-1">3</small><span>★</span></td>
                        <td class="w-100">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 64%" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="p-0"><small class="text-gray">64</small></td>
                      </tr>
                      <tr>
                        <td class="p-0 text-gray"><small class="mr-1">4</small><span>★</span></td>
                        <td class="w-100">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 93%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="p-0"><small class="text-gray">93</small></td>
                      </tr>
                      <tr>
                        <td class="p-0 text-gray"><small class="mr-1">5</small><span>★</span></td>
                        <td class="w-100">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 82%" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="p-0"><small class="text-gray">82</small></td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="text-center mt-3">17 of your friends liked this</p>
                  <div class="wrapper d-flex justify-content-center image-group">
                    <img src="https://placehold.it/100x100" alt="profile" class="img-xs rounded-circle">
                    <img src="https://placehold.it/100x100" alt="profile" class="img-xs rounded-circle">
                    <img src="https://placehold.it/100x100" alt="profile" class="img-xs rounded-circle">
                    <img src="https://placehold.it/100x100" alt="profile" class="img-xs rounded-circle">
                    <img src="https://placehold.it/100x100" alt="profile" class="img-xs rounded-circle">
                    <img src="https://placehold.it/100x100" alt="profile" class="img-xs rounded-circle">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recommended</h4>
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">
                    <img class="img-sm rounded-circle" src="https://placehold.it/100x100" alt="profile">
                    <div class="wrapper ml-3">
                      <h6 class="mb-0"><strong>Erwin E. Brown</strong></h6>
                      <small class="text-muted mb-0">San Fransisco, CA</small>
                    </div>
                    <div class="badge badge-pill badge-primary ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                  </div>
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">
                    <img class="img-sm rounded-circle" src="https://placehold.it/100x100" alt="profile">
                    <div class="wrapper ml-3">
                      <h6 class="mb-0"><strong>Madeline Kennedy</strong></h6>
                      <small class="text-muted mb-0">San Fransisco, CA</small>
                    </div>
                    <div class="badge badge-pill badge-success ml-auto px-1 py-1"><i class="mdi mdi-plus font-weight-bold"></i></div>
                  </div>
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">
                    <img class="img-sm rounded-circle" src="https://placehold.it/100x100" alt="profile">
                    <div class="wrapper ml-3">
                      <h6 class="mb-0"><strong>George A. Llanes</strong></h6>
                      <small class="text-muted mb-0">San Fransisco, CA</small>
                    </div>
                    <div class="badge badge-pill badge-primary ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                  </div>
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">
                    <img class="img-sm rounded-circle" src="https://placehold.it/100x100" alt="profile">
                    <div class="wrapper ml-3">
                      <h6 class="mb-0"><strong>Madeline Kennedy</strong></h6>
                      <small class="text-muted mb-0">Carleton University, Ontario</small>
                    </div>
                    <div class="badge badge-pill badge-success ml-auto px-1 py-1"><i class="mdi mdi-plus font-weight-bold"></i></div>
                  </div>
                  <div class="wrapper d-flex align-items-center py-2 mb-4">
                    <img class="img-sm rounded-circle" src="https://placehold.it/100x100" alt="profile">
                    <div class="wrapper ml-3">
                      <h6 class="mb-0"><strong>Rafell John</strong></h6>
                      <small class="text-muted mb-0">Alaska, USA</small>
                    </div>
                    <div class="badge badge-pill badge-success ml-auto px-1 py-1"><i class="mdi mdi-plus font-weight-bold"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <h4 class="card-title">Revenue</h4>
                    <p class="text-muted ml-auto">17 February 2018</p>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <div class="alert alert-outline-primary d-flex justify-content-between" role="alert">
                        <p class="mb-0 d-inline-block">Added API call to update track!</p><i class="mdi mdi-alert-circle-outline mr-0"></i>
                      </div>
                      <div class="list">
                        <span class="text-small"><strong>@Michael</strong> Cras sit amet nibh libero, in gravida nulla.</span>
                        <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                          <span class="text-small text-muted">17 February 2018 08:48 PM</span>
                          <span class="text-small text-muted">Reply</span>
                        </div>
                      </div>
                      <div class="list pt-2">
                        <span class="text-small"><strong>@Doyle</strong> Bell Cras sit amet nibh libero, in gravida nulla, Nulla vel metus.</span>
                        <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                          <span class="text-small text-muted">19 March 2018 10:21 PM</span>
                          <span class="text-small text-muted">Reply</span>
                        </div>
                      </div>
                      <div class="list pt-2">
                        <span class="text-small"><strong>@Maxine</strong> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</span>
                        <div class="d-flex justify-content-between pb-3 mt-2">
                          <span class="text-small text-muted">02 May 2018 03:31 AM</span>
                          <span class="text-small text-muted">Reply</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 pl-md-4">
                      <img class="rounded img-lg" src="https://placehold.it/100x100" alt="profile image">
                      <h4 class="font-weight-bold mt-3">Phyllis K. Maciel</h4>
                      <p class="text-small">An UI/UX Designer living in Jakarta,Indonesia.</p>
                      <div class="d-flex mt-4">
                        <span class="text-primary mr-4"><i class="mdi mdi-map-marker-outline mr-1"></i>Indonesia</span>
                        <span class="text-primary"><i class="mdi mdi-email-outline mr-1"></i>Hire Me</span>
                      </div>
                      <small class="text-muted">Let me know if you want to get in touch.</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                      <div class="wrapper d-flex align-items-center justify-content-center">
                        <div class="btn social-btn btn-twitter btn-rounded d-inline-block"><i class="mdi mdi-twitter"></i></div>
                        <div class="wrapper d-flex flex-column ml-4">
                          <p class="font-weight-bold mb-2">Twitter</p>
                          <p class="mb-0 text-muted">656 follower</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                      <div class="wrapper d-flex align-items-center justify-content-center">
                        <div class="btn social-btn btn-facebook btn-rounded d-inline-block"><i class="mdi mdi-facebook"></i></div>
                        <div class="wrapper d-flex flex-column ml-4">
                          <p class="font-weight-bold mb-2">Facebook</p>
                          <p class="mb-0 text-muted">1,235 friends</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                      <div class="wrapper d-flex align-items-center justify-content-center">
                        <div class="btn social-btn btn-google btn-rounded d-inline-block"><i class="mdi mdi-google-plus"></i></div>
                        <div class="wrapper d-flex flex-column ml-4">
                          <p class="font-weight-bold mb-2">Google+</p>
                          <p class="mb-0 text-muted">835 friends</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 d-flex justify-content-between justify-content-md-center">
                      <div class="wrapper d-flex align-items-center justify-content-center">
                        <div class="btn social-btn btn-warning btn-rounded d-inline-block"><i class="mdi mdi-rss"></i></div>
                        <div class="wrapper d-flex flex-column ml-4">
                          <p class="font-weight-bold mb-2">Subscribers</p>
                          <p class="mb-0 text-muted">335 people</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Updates</h4>
                  <div class="image-grid row">
                    <div class="col-md-6 pr-md-2">
                      <img class="w-100 img-fluid rounded" src="https://placehold.it/350x459" alt="images">
                    </div>
                    <div class="col-md-6 pl-md-2">
                      <div class="row">
                        <div class="col-md-12 mb-3 mt-3 mt-md-0">
                          <img class="w-100 img-fluid rounded" src="https://placehold.it/350x218" alt="images">
                        </div>
                        <div class="col-md-12">
                          <img class="w-100 img-fluid rounded" src="https://placehold.it/350x218" alt="images">
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus, nascetur ridiculus mus.</p>
                  <div class="d-flex align-items-center">
                    <span class="d-none d-sm-inline-block"><strong>jack Menqu</strong> All of Rwanda is at high elevation</span>
                    <span class="ml-auto text-muted">7:30 pm<i class="ml-2 mdi mdi-heart-outline"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
								<div class="card-body">
									<h4 class="card-title">Todo list</h4>
									<div class="add-items d-flex">
										<input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
										<button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
									</div>
									<div class="list-wrapper">
										<ul class="d-flex flex-column-reverse todo-list">
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Meeting with Alisa
													</label>
												</div>
												<i class="remove mdi mdi-close-circle-outline"></i>
											</li>
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Create invoice
													</label>
												</div>
												<i class="remove mdi mdi-close-circle-outline"></i>
											</li>
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Print Statements
													</label>
												</div>
												<i class="remove mdi mdi-close-circle-outline"></i>
											</li>
											<li class="completed">
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Prepare for presentation
													</label>
												</div>
												<i class="remove mdi mdi-close-circle-outline"></i>
											</li>
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Pick up kids from school
													</label>
												</div>
												<i class="remove mdi mdi-close-circle-outline"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin Dept</h4>
                  <div class="w-50 mt-5 mb-4 mx-auto">
                    <div id="revenueCircle3" class="progressbar-js-circle"></div>
                  </div>
                  <h4 class="text-center"><strong>Storage Size</strong></h4>
                  <h4 class="text-center"><strong>1.98TB</strong></h4>
                  <div class="d-flex row mt-5">
                    <div class="col">
                      <p class="text-left mb-2">1.30 GB free</p>
                      <h4 class="text-left"><strong>35.4%</strong></h4>
                    </div>
                    <div class="col">
                      <p class="text-right mb-2">1.30 GB free</p>
                      <h4 class="text-right"><strong>35.4%</strong></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Updates</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Asigned Name</th>
                        <th>Progress</th>
                        <th>Amount</th>
                        <th>Deadline</th>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div><img src="https://placehold.it/100x100" alt="profile image"></div>
                            <div class="ml-3">
                              <p class="mb-1">Jessica T. Phillips</p>
                              <small class="text-muted">Sales Assistant</small>
                            </div>
                          </div>
                        </td>
                        <td><canvas id="areaChart_1" style="height:30px; max-width:130px;"></canvas></td>
                        <td>$450.12</td>
                        <td>Mar 08 2018</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div><img src="https://placehold.it/100x100" alt="profile image"></div>
                            <div class="ml-3">
                              <p class="mb-1">Luke J. Sain</p>
                              <small class="text-muted">Software Engineer</small>
                            </div>
                          </div>
                        </td>
                        <td><canvas id="areaChart_2" style="height:30px; max-width:130px;"></canvas></td>
                        <td>$124.66</td>
                        <td>Mar 09 2018</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div><img src="https://placehold.it/100x100" alt="profile image"></div>
                            <div class="ml-3">
                              <p class="mb-1">Mark C. Diaz</p>
                              <small class="text-muted">Accountant</small>
                            </div>
                          </div>
                        </td>
                        <td><canvas id="areaChart_3" style="height:30px; max-width:130px;"></canvas></td>
                        <td>$763.00</td>
                        <td>Mar 10 2018</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div><img src="https://placehold.it/100x100" alt="profile image"></div>
                            <div class="ml-3">
                              <p class="mb-1">Margeret V. Ligon</p>
                              <small class="text-muted">Software Engineer</small>
                            </div>
                          </div>
                        </td>
                        <td><canvas id="areaChart_4" style="height:30px; max-width:130px;"></canvas></td>
                        <td>$120.76</td>
                        <td>Mar 11 2018</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div><img src="https://placehold.it/100x100" alt="profile image"></div>
                            <div class="ml-3">
                              <p class="mb-1">Messy max</p>
                              <small class="text-muted">Personnel Lead</small>
                            </div>
                          </div>
                        </td>
                        <td><canvas id="areaChart_5" style="height:30px; max-width:130px;"></canvas></td>
                        <td>$450.20</td>
                        <td>Mar 12 2018</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->