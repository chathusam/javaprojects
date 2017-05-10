
package interf;


import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.swing.*;

import supunpackage.dbconnect;



public class login extends javax.swing.JFrame {

    Connection con=null;
    PreparedStatement p=null;
    ResultSet rs=null;
    
    public login() {
        initComponents();
        
       con=dbconnect.connect();
    }
    
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        name = new javax.swing.JTextField();
        jButton1 = new javax.swing.JButton();
        jCheckBox1 = new javax.swing.JCheckBox();
        jLabel3 = new javax.swing.JLabel();
        pwd = new javax.swing.JPasswordField();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(null);

        jLabel1.setFont(new java.awt.Font("Calibri", 1, 18)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setText("Username");
        jLabel1.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        getContentPane().add(jLabel1);
        jLabel1.setBounds(280, 200, 100, 30);

        jLabel2.setFont(new java.awt.Font("Calibri", 1, 18)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(255, 255, 255));
        jLabel2.setText("Password");
        jLabel2.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        getContentPane().add(jLabel2);
        jLabel2.setBounds(280, 260, 100, 30);
        getContentPane().add(name);
        name.setBounds(440, 200, 159, 30);

        jButton1.setBackground(new java.awt.Color(255, 255, 255));
        jButton1.setText("login");
        jButton1.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton1);
        jButton1.setBounds(490, 320, 90, 40);

        jCheckBox1.setForeground(new java.awt.Color(255, 255, 255));
        jCheckBox1.setText("show Password");
        jCheckBox1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jCheckBox1ActionPerformed(evt);
            }
        });
        getContentPane().add(jCheckBox1);
        jCheckBox1.setBounds(280, 320, 140, 40);
        getContentPane().add(jLabel3);
        jLabel3.setBounds(130, 220, 0, 0);

        pwd.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                pwdActionPerformed(evt);
            }
        });
        getContentPane().add(pwd);
        pwd.setBounds(440, 260, 160, 30);
        getContentPane().add(jLabel4);
        jLabel4.setBounds(750, 20, 0, 0);
        getContentPane().add(jLabel5);
        jLabel5.setBounds(640, 120, 0, 0);

        jLabel6.setIcon(new javax.swing.ImageIcon("C:\\Users\\Chathu\\Desktop\\burj_al_arab_68.jpg")); // NOI18N
        jLabel6.setPreferredSize(new java.awt.Dimension(800, 521));
        getContentPane().add(jLabel6);
        jLabel6.setBounds(0, 0, 640, 390);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed

 
        String un=name.getText();
        String pw=String.valueOf(pwd.getPassword());
        
       
        String m="select PW from log where Name='"+un+"'";
        
       
        try {
             
            p=con.prepareStatement(m);
          
            rs=p.executeQuery();
            rs.next();
            String x=rs.getString("PW");
          
            int t=x.compareTo(pw);
            
             if(t==0)
                 
            {
       
               JOptionPane.showMessageDialog(null," Name and pwd is correct");
                
               
                 main m1=new main();
                 m1.setVisible(true);
                 this.dispose();
                                  
            }
            
            else
                 {
                    JOptionPane.showMessageDialog(null," Name and pwd is  not correct");
                 }
            } 
          
        catch (Exception ex) {
            
             JOptionPane.showMessageDialog(null,"not a valid user");
             
          
                     }
        
    }//GEN-LAST:event_jButton1ActionPerformed

    
    private void jCheckBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jCheckBox1ActionPerformed
       
        
        
    }//GEN-LAST:event_jCheckBox1ActionPerformed

    private void pwdActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_pwdActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_pwdActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
      java.awt.EventQueue.invokeLater(new Runnable() {
           public void run() {
              new login().setVisible(true);
            }
        });
      
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButton1;
    private javax.swing.JCheckBox jCheckBox1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JTextField name;
    private javax.swing.JPasswordField pwd;
    // End of variables declaration//GEN-END:variables
}
