<div class="recent-grid">
        <div class="projects"> 
          <div class="card">
            <div class="card-header">
              <h2>Pastors nearing retirement</h2>
              <button>See all <span class="las la-arrow-right"></span></button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" width="100%">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Picture</th>
                      <th scope="col">Fullname</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Date Of Birth</th>
                      <th scope="col">Phone No.</th>
                      <th scope="col">Email address</th>
                      <th scope="col">National ID</th>
                      <th scope="col">Church</th>
                      <th scope="col">Pastorate</th>
                      <th scope="col">Area</th>
                      <th scope="col">Ward</th>
                      <th scope="col">Sub-county</th>
                      <th scope="col">County</th>
                      <th scope="col">Age</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pastor as $i => $pastors) { ?>
                      <tr>
                          <th scope="row"><?php echo $i + 1 ?></th>
                          <td>
                               <a href="pastorview.php?id=<?php echo $pastors['id'] ?>">
                              <img style="width: 3rem; height:3rem; border-radius: 50%;" src="<?php echo $pastors['picture'] ?>" >
                          </a>
                              
                          </td>
                          <td><?php echo $pastors['full_name'] ?></td>
                          <td><?php echo $pastors['gender'] ?></td>
                          <td><?php echo $pastors['year_of_birth'] ?></td>
                          <td><?php echo $pastors['phone_no'] ?></td>
                          <td><?php echo $pastors['email'] ?></td>
                          <td><?php echo $pastors['national_id'] ?></td>
                          <td><?php echo $pastors['church'] ?></td>
                          <td><?php echo $pastors['pastorate'] ?></td>
                          <td><?php echo $pastors['area'] ?></td>
                          <td><?php echo $pastors['ward'] ?></td>
                          <td><?php echo $pastors['sub_county'] ?></td>
                          <td><?php echo $pastors['county'] ?></td>
                          <td><?php

                          $today = date("Y-m-d");
                          $diff = date_diff(date_create($pastors['year_of_birth']), date_create($today));
                          echo $age = $diff->y;
                       ?></td>
                          <td>
                               <a href="updatepastor.php?id=<?php echo $pastors['id'] ?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>
                               <form method="post" action="deletepastor.php" style="display: inline">
                                  <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
                                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<div>
  <span>
    
  </span>
</div>