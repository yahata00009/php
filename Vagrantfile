# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.vm.box = "practice"
  config.vm.define 'practice' do |node|
    node.vm.hostname = 'practice'
  end

  config.vm.network "private_network", ip: "192.168.33.202"
  config.vm.network "forwarded_port", guest: 80, host: 10080, auto_correct: true  # HTTP
  config.vm.network "forwarded_port", guest: 443, host: 10443, auto_correct: true  # HTTPS

  # 共有フォルダその１
  config.vm.synced_folder "./sandbox1", "/home/sandbox1"
  # 共有フォルダその２（Laravel用）
  config.vm.synced_folder "./sandbox2", "/home/sandbox2"

  # VitrualBoxの設定、仮想マシンスペック
  config.vm.provider "virtualbox" do |vb|
    # 表示名、GUIの使用、CPU数、メモリ
    vb.name = "practice"
    vb.gui = false
    vb.cpus = "4"
    vb.memory = "8192"
  end
end
