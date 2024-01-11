<form class="form form-horizontal"  action="categoryFormSubmit.php" method="POST">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Category Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" name="categoryName">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Category Description</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8"></label>
                    <div class="col-sm-9">
                    <button type="submit" name="save_data" class="btn btn-primary btn-block">Submit</button>
                    </div>
                  </div>
                  </form>