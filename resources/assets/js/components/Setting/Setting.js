import React, { Component } from 'react';
import { Layout, Menu, Form, Input, Button } from 'antd';
const { Sider, Content } = Layout;
const FormItem = Form.Item;
import { Route, Link } from 'react-router-dom'
import { SettingWeb } from './SettingWeb';
import { SettingPersonal } from './SettingPersonal';
import styles from "./Setting.css"

export class Setting extends React.Component {
  render(){
    return (
      <div>
        <Menu
          mode="horizontal"
          selectedKeys={[this.props.match.params.module]}>
          <Menu.Item key="web">
            <Link to="/settings/web">
              网站设置
            </Link>
          </Menu.Item>
          <Menu.Item key="personal">
            <Link to="/settings/personal">
              博主设置
            </Link>
          </Menu.Item>
        </Menu>
        <Route path="/settings/web" exact component={SettingWeb}/>
        <Route path="/settings/personal" exact component={SettingPersonal}/>
      </div>
    )
  }
  //new function
}
