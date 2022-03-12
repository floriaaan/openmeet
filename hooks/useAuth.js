import React, { createContext, useContext, useEffect, useState } from "react";
const AuthContext = createContext();
import { firebase, createUser } from "libs/firebase";
import {
  getAuth,
  signInWithPopup,
  GoogleAuthProvider,
  signOut,
  onAuthStateChanged,
  signInWithEmailAndPassword,
  createUserWithEmailAndPassword,
  GithubAuthProvider,
  OAuthProvider,
  TwitterAuthProvider,
  FacebookAuthProvider,
} from "firebase/auth";
import { useRouter } from "next/router";



const auth = getAuth(firebase);

function AuthProvider({ children }) {
  const firebaseAuth = useFirebaseAuth();
  return (
    <AuthContext.Provider value={firebaseAuth}>{children}</AuthContext.Provider>
  );
}

const useAuth = () => useContext(AuthContext);

export { AuthProvider, useAuth };

const formatUser = async (user) => {
  return {
    uid: user.uid,
    email: user.email,
    fullName: user.displayName || "Name not provided",
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
  
  const redirectAfterAuth = (path) => {
    if (path && typeof path === "string") {
      Router.push(path);
    } else {
      Router.push("/");
    }
  };
  

  const handleUser = async (rawUser) => {
    if (rawUser) {
      const user = await createUser(await formatUser(rawUser));
      setUser(user);

      return user;
    } else {
      setUser(false);
      return false;
    }
  };

  const signin = async (email, password, redirect) => {
    try {
      const response = await signInWithEmailAndPassword(auth, email, password);
      handleUser(response.user);
    } catch (err) {
      return err;
    }
    redirectAfterAuth(redirect);
  };

  const register = async (email, password, pseudo, redirect) => {
    const response = await createUserWithEmailAndPassword(
      auth,
      email,
      password
    );
    handleUser({ ...response.user, displayName: pseudo });
    redirectAfterAuth(redirect);
  };

  const signinWithGoogle = async (redirect) => {
    const response = await signInWithPopup(auth, new GoogleAuthProvider());
    handleUser(response.user);
    redirectAfterAuth(redirect);

  };

  const signinWithFacebook = async (redirect) => {
    const response = await signInWithPopup(auth, new FacebookAuthProvider());
    handleUser(response.user);
    redirectAfterAuth(redirect);
    
  };

  const signinWithTwitter = async (redirect) => {
    const response = await signInWithPopup(auth, new TwitterAuthProvider());
    handleUser(response.user);
    redirectAfterAuth(redirect);
  };

  const signinWithGitHub = async (redirect) => {
    const response = await signInWithPopup(auth, new GithubAuthProvider());
    handleUser(response.user);
    redirectAfterAuth(redirect);

  };

  const signinWithMicrosoft = async (redirect) => {
    const response = await signInWithPopup(
      auth,
      new OAuthProvider("microsoft.com")
    );
    handleUser(response.user);
    redirectAfterAuth(redirect);
  };

  const signout = async () => {
    await signOut(auth);
    return await handleUser(false);
  };

  useEffect(() => {
    const unsubscribe = onAuthStateChanged(auth, handleUser);
    return () => unsubscribe();
  }, []);

  return {
    user,
    signin,
    signinWithGoogle,
    signinWithGitHub,
    signinWithMicrosoft,
    signinWithFacebook,
    signinWithTwitter,
    signout,
    register,
  };
}

