// if (empty($this->_url[0])) {
//            require 'controllers/index.php';
//            $this->_controller = new Index();
//            $this->_controller->index();
//        } else {
//            $file = 'controllers/' . $this->_url[0] . '.php';
//            if (file_exists($file)) {
//                require $file;
//            } else {
//                $this->error();
//            }
//            $this->_controller = new $this->_url[0];
//            $this->_controller->loadModel($this->_url[0]);
//            if (empty($this->_url[1])) {
//                $this->_controller->index();
//            } else {
//                if (method_exists($this->_controller, $this->_url[1])) {
//                    if (empty($this->_url[2])) {
//                        $this->_controller->{$this->_url[1]}();
//                    } else {
//                        
//                        if (empty($this->_url[3])) {
//                            $this->_controller->{$this->_url[1]}($this->_url[2]);
//                        } else {
//                            $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
//                        }
//                    }
//                } else {
//                    $this->error();
//                }
//            }
//        }