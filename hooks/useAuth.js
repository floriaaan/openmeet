import React, { createContext, useContext, useEffect, useState } from "react";
const AuthContext = createContext();
import { firebase, createUser, auth } from "@libs/firebase";
import { useRouter } from "next/router";

function AuthProvider({ children }) {
  const auth = useFirebaseAuth();
  return <AuthContext.Provider value={auth}>{children}</AuthContext.Provider>;
}

const useAuth = () => useContext(AuthContext);

export { AuthProvider, useAuth };

const formatUser = async (user) => {
  return {
    uid: user.uid,
    email: user.email,
    fullName: user.displayName,
    provider: user.providerData[0].providerId,
    photoUrl: user.photoURL,
    lastSignedIn: user.metadata.lastSignInTime,
    createdAt: user.metadata.creationTime,
    phoneNumber: user.phoneNumber,
  };
};

function useFirebaseAuth() {
  const [user, setUser] = useState(null);

  const Router = useRouter();

  const handleUser = async (rawUser) => {
    if (rawUser) {
      const user = await formatUser(rawUser);

      createUser(user.uid, user);

      setUser(user);

      return user;
    } else {
      setUser(false);
      return false;
    }
  };

  const signin = async (email, password, redirect) => {
    try {
      const response = await auth.signInWithEmailAndPassword(email, password);
      handleUser(response.user);
    } catch (err) {
      return err;
    }
    if (redirect) {
      Router.push(redirect);
    } else {
      Router.push("/");
    }
  };

  const register = async (email, password, pseudo, redirect) => {
    const response = await auth.createUserWithEmailAndPassword(email, password);
    handleUser({ ...response.user, displayName: pseudo });
    if (redirect) {
      Router.push(redirect);
    } else {
      Router.push("/");
    }
  };

  const signinWithGoogle = async (redirect) => {
    const response = await auth.signInWithPopup(
      new firebase.auth.GoogleAuthProvider()
    );
    handleUser(response.user);
    if (redirect) {
      Router.push(redirect);
    } else {
      Router.push("/");
    }
  };

  const signinWithGitHub = async (redirect) => {
    const response = await auth.signInWithPopup(
      new firebase.auth.GithubAuthProvider()
    );
    handleUser(response.user);
    if (redirect) {
      Router.push(redirect);
    } else {
      Router.push("/");
    }
  };

  const signinWithMicrosoft = async (redirect) => {
    const response = await auth.signInWithPopup(
      new firebase.auth.OAuthProvider("microsoft.com")
    );
    handleUser(response.user);
    if (redirect) {
      Router.push(redirect);
    } else {
      Router.push("/");
    }
  };

  const signout = async () => {
    await auth.signOut();
    return await handleUser(false);
  };

  useEffect(() => {
    const unsubscribe = auth.onIdTokenChanged(handleUser);

    return () => unsubscribe();
  }, []);

  return {
    user,
    signin,
    signinWithGoogle,
    signinWithGitHub,
    signinWithMicrosoft,
    signout,
    register,
  };
}
